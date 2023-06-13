import * as THREE from "three";
// import { TrackballControls } from "three/examples/jsm/controls/TrackballControls";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";
import { DRACOLoader } from "three/examples/jsm/loaders/DRACOLoader.js";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js";

import { MeshSurfaceSampler } from "three/examples/jsm/math/MeshSurfaceSampler.js";

let WIDTH, HEIGHT, aspectRatio;
let renderer;
let scene, camera;
let geometry, material, mesh;
let container;
let mouse = new THREE.Vector2();



init();
animate();

function init() {
    const dracoLoader = new DRACOLoader();
    const loader = new GLTFLoader();
    dracoLoader.setDecoderPath("https://www.gstatic.com/draco/v1/decoders/");
    dracoLoader.setDecoderConfig({ type: "js" });
    loader.setDRACOLoader(dracoLoader);

    container = document.getElementById("myCanvas");
    HEIGHT = container.clientHeight;
    WIDTH = container.clientWidth;
    aspectRatio = WIDTH / HEIGHT;

    renderer = new THREE.WebGLRenderer({
        antialias: false,
        powerPreference: "high-performance",
        canvas: container,
    });
    renderer.setSize(WIDTH, HEIGHT);
    renderer.setClearColor(0x232323);
    scene = new THREE.Scene();

    camera = new THREE.PerspectiveCamera(35, aspectRatio, 0.1, 1000);
    camera.position.set(0, 5, 16);
    scene.add(camera);

    const controls = new OrbitControls(camera, renderer.domElement);

    const glburl = "/storage/images/kezilabda1.glb";
    /*
    loader.load(
        glburl,
        function (gltf) {
            let pts = [];
            let v3 = new THREE.Vector3();
            gltf.scene.traverse((child) => {
                if (child.isMesh) {
                    let pos = child.geometry.attributes.position;
                    for (let i = 0; i < pos.count; i++) {
                        v3.fromBufferAttribute(pos, i);
                        pts.push(v3.clone());
                    }
                }
            });

            let g = new THREE.BufferGeometry().setFromPoints(pts);
            g.center();
            let m = new THREE.PointsMaterial({ color: "aqua", size: 0.05 });

            let p = new THREE.Points(g, m);
            scene.add(p);
        },
        undefined,
        function (error) {
            console.error(error);
        }
    );
    */

    loader.load(glburl, function (gltf) {
        gltf.scene.traverse((obj) => {
            if (obj.isMesh) {
                sampler = new MeshSurfaceSampler(obj).build();
            }
        });
        transformMesh();
    });

    window.addEventListener("resize", handleWindowResize, false);

}

let sampler;
let uniforms = { mousePos: { value: new THREE.Vector3() } };
let pointsGeometry = new THREE.BufferGeometry();
const cursor = { x: 0, y: 0 };
const vertices = [];
const tempPosition = new THREE.Vector3();

function transformMesh() {
    // Loop to sample a coordinate for each points
    for (let i = 0; i < 59000; i++) {
        // Sample a random position in the model
        sampler.sample(tempPosition);
        // Push the coordinates of the sampled coordinates into the array
        vertices.push(tempPosition.x, tempPosition.y, tempPosition.z);
    }

    // Define all points positions from the previously created array
    pointsGeometry.setAttribute(
        "position",
        new THREE.Float32BufferAttribute(vertices, 3)
    );

    // Define the matrial of the points
    const pointsMaterial = new THREE.PointsMaterial({
        color: 'aqua',
        size: 0.005,
        transparent: true,
    });

    // Create the custom vertex shader injection
    pointsMaterial.onBeforeCompile = function (shader) {
        shader.uniforms.mousePos = uniforms.mousePos;

        shader.vertexShader = `
          uniform vec3 mousePos;
          varying float vNormal;

          ${shader.vertexShader}`.replace(
            `#include <begin_vertex>`,
            `#include <begin_vertex>
            vec3 seg = position - mousePos;
            vec3 dir = normalize(seg);
            float dist = length(seg);
            if (dist < 1.5){
              float force = clamp(1.0 / (dist * dist), -0., .5);
              transformed += dir * force;
              vNormal = force /0.5;
            }
          `
        );
    };

    // Create an instance of points based on the geometry & material
    const points = new THREE.Points(pointsGeometry, pointsMaterial);

    // Add them into the main group
    scene.add(points);
}

function handleWindowResize() {
    HEIGHT = window.innerHeight;
    WIDTH = window.innerWidth;
    renderer.setSize(WIDTH, HEIGHT);
    aspectRatio = WIDTH / HEIGHT;
    camera.aspect = aspectRatio;
    camera.updateProjectionMatrix();

    render();
}

function animate() {
    requestAnimationFrame(animate);
    render();
}

function render() {
    renderer.render(scene, camera);
}

document.addEventListener(
    "mousemove",
    (event) => {
        event.preventDefault();
        cursor.x = event.clientX / window.innerWidth - 0.5;
        cursor.y = event.clientY / window.innerHeight -0.5;
        uniforms.mousePos.value.set(cursor.x, cursor.y, 0);
    },
    false
);
