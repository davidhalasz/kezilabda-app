import * as THREE from "three";
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls";
import { DRACOLoader } from "three/examples/jsm/loaders/DRACOLoader";
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader";
import { MeshSurfaceSampler } from "three/examples/jsm/math/MeshSurfaceSampler";
import * as TWEEN from "three/examples/jsm/libs/tween.module";

const dracoLoader = new DRACOLoader();
const loader = new GLTFLoader();
dracoLoader.setDecoderPath("https://www.gstatic.com/draco/v1/decoders/");
dracoLoader.setDecoderConfig({ type: "js" });
loader.setDRACOLoader(dracoLoader);
let WIDTH, HEIGHT, aspectRatio;
let renderer;
let scene, camera;
const container = document.getElementById("myCanvas");
let points;
let numPoints;
let starGroup;

//transformMesh
let sampler;
let pointsGeometry = new THREE.BufferGeometry();
let uniforms = { mousePos: { value: new THREE.Vector3() } };
const cursor = { x: 0, y: 0 };
const vertices = [];
const tempPosition = new THREE.Vector3();
let controls;
let planeMesh;

function background() {
    starGroup = new THREE.Group();
    scene.add(starGroup);

    const starTexture = new THREE.TextureLoader().load(
        "/storage/images/para.png"
    );
    const starMaterial = new THREE.SpriteMaterial({
        map: starTexture,
        color: 0xaaaaaa,
        opacity: 0.8,
        blending: THREE.AdditiveBlending,
        transparent: true,
    });

    const numStars = 6000;

    for (let i = 0; i < numStars; i++) {
        const star = new THREE.Sprite(starMaterial);
        const x = Math.random() * 600 - 300;
        const y = Math.random() * 600 - 300;
        const z = Math.random() * 600 - 300;

        star.position.set(x, y, z);
        star.scale.set(0.4, 0.4, 1);

        star.userData.initialPosition = star.position.clone();

        starGroup.add(star);
    }

    renderer.setAnimationLoop(() => {
        starGroup.children.forEach((star) => {
            star.position.z += 0.1;

            if (star.position.z > 200) {
                star.position.z = -200;
            }
        });

        renderer.render(scene, camera);
    });
}

function createScene() {
    HEIGHT = container.clientHeight;
    WIDTH = container.clientWidth;
    aspectRatio = WIDTH / HEIGHT;

    renderer = new THREE.WebGLRenderer({
        antialias: false,
        powerPreference: "high-performance",
        canvas: container,
    });
    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
    renderer.setSize(WIDTH, HEIGHT);
    renderer.setClearColor(0x232323);
    scene = new THREE.Scene();

    const planeGeometry = new THREE.PlaneGeometry(WIDTH, HEIGHT);
    const planeMaterial = new THREE.MeshStandardMaterial({
        color: 0x232323,
        transparent: true,
        opacity: 0.4,
    });
    planeMesh = new THREE.Mesh(planeGeometry, planeMaterial);
    planeMesh.position.set(0, 0, -1);
    scene.add(planeMesh);

    // Create a point light
    const pointLight = new THREE.PointLight(0xFFD700, 9, 6, 2);
    pointLight.position.set(0, 0, 2);
    scene.add(pointLight);
}

function createCamera() {
    camera = new THREE.PerspectiveCamera(35, aspectRatio, 1, 1000);
    camera.position.set(0, -0.4, 11);
    //camera.position.z = 13;
    scene.add(camera);
}

function createObjectMesh() {
    const glburl = "/storage/images/kezilabda1.glb";
    loader.load(glburl, function (gltf) {
        gltf.scene.traverse((obj) => {
            if (obj.isMesh) {
                sampler = new MeshSurfaceSampler(obj).build();
            }
        });
        transformMesh();
    });
}

function transformMesh() {
    numPoints = 19000;
    for (let i = 0; i < numPoints; i++) {
        sampler.sample(tempPosition);
        vertices.push(tempPosition.x, tempPosition.y, tempPosition.z);
    }

    pointsGeometry.setAttribute(
        "position",
        new THREE.Float32BufferAttribute(vertices, 3)
    );

    const pointsMaterial = new THREE.PointsMaterial({
        color: "aqua",
        size: 0.03,
        transparent: true,
        blending: THREE.AdditiveBlending,
        opacity: 0.8,
        depthWrite: false,
        sizeAttenuation: true,
    });

    points = new THREE.Points(pointsGeometry, pointsMaterial);
    scene.add(points);

    const bbox = new THREE.Box3().setFromObject(points);
    const center = new THREE.Vector3();
    bbox.getCenter(center);

    // Translate the object by subtracting the center
    //const offset = new THREE.Vector3(1, -0.5, 0);
    points.position.sub(center);
}

function introAnimation() {
    controls.enabled = false; //disable orbit controls to animate the camera

    new TWEEN.Tween(camera.position.set(-0.4, -1, 0))
        .to(
            {
                // from camera position
                x: 2, //desired x position to go
                y: -0.4, //desired y position to go
                z: 11, //desired z position to go
            },
            6500
        ) // time take to animate
        .easing(TWEEN.Easing.Quadratic.InOut)
        .start() // define delay, easing
        .onComplete(function () {
            //on finish animation
            controls.enabled = false; //enable orbit controls
            document.querySelector(".main--title").classList.add("ended");
            setOrbitControlsLimits(); //enable controls limits
            TWEEN.remove(this); // remove the animation from memory
        });
}

function setOrbitControlsLimits() {
    controls.enableDamping = true;
    controls.dampingFactor = 0.04;
    controls.minDistance = 0.5;
    controls.maxDistance = 11;
    controls.enableRotate = false;
    controls.enableZoom = false;
    controls.zoomSpeed = 0.5;
    controls.autoRotate = false;
}

function rendeLoop() {
    TWEEN.update();

    controls.update();

    requestAnimationFrame(rendeLoop);
}

function onMouseMove(event) {
    // Calculate normalized device coordinates (NDC) from mouse position
    event.preventDefault();
    cursor.x = (event.clientX / WIDTH) * 2 - 1;
    cursor.y = -(event.clientY / HEIGHT) * 2 + 1.5;
    uniforms.mousePos.value.set(cursor.x, cursor.y, 0);

    starGroup.children.forEach((star) => {
        const { initialPosition } = star.userData;
        const scaleFactor = 0.1; // Adjust the scale factor as needed

        star.position.x = initialPosition.x + cursor.x * scaleFactor;
        star.position.y = initialPosition.y + cursor.y * scaleFactor;
    });

    const raycaster = new THREE.Raycaster();
    raycaster.setFromCamera(cursor, camera);
    const intersects = raycaster.intersectObject(points);

    if (intersects.length) {
        const { point } = intersects[0];

        for (let i = 0; i < numPoints; i++) {
            const vertex = pointsGeometry.attributes.position.array.slice(
                i * 3,
                i * 3 + 3
            );
            const position = new THREE.Vector3().fromArray(vertex);

            const seg = position.clone().sub(point);
            const dir = seg.clone().normalize();
            const dist = seg.length();

            if (dist < 0.5) {
                const force = THREE.MathUtils.clamp(
                    1.0 * (dist * dist),
                    -0.3,
                    0.3
                );
                position.addScaledVector(dir, force);

                // Update the position in the buffer geometry
                pointsGeometry.attributes.position.setXYZ(
                    i,
                    position.x,
                    position.y,
                    position.z
                );
            }
        }

        // Mark the buffer geometry as needing an update
        pointsGeometry.attributes.position.needsUpdate = true;
    } else {
        // Reset the points to their original positions
        pointsGeometry.setAttribute(
            "position",
            new THREE.Float32BufferAttribute(vertices, 3)
        );
    }

    const rotationX = cursor.x * Math.PI * 0.02; // Adjust the rotation factor as needed
    const rotationY = cursor.y * Math.PI * 0.02; // Adjust the rotation factor as needed

    // Set rotation values to the camera
    camera.position.x = rotationX;
    camera.position.y = rotationY;
}

function init() {
    createScene();
    createCamera();
    createObjectMesh();
    background();
    controls = new OrbitControls(camera, renderer.domElement);
    introAnimation();
    //postProcessing();
    rendeLoop();
    container.addEventListener("mousemove", onMouseMove, false);
    window.addEventListener('resize', () => {
        const width = window.innerWidth
        const height = window.innerHeight
        camera.aspect = width / height
        camera.updateProjectionMatrix()
        renderer.setSize(width, height)
        renderer.setPixelRatio(2)
    });
}

function render() {
    renderer.render(scene, camera);
}

function animate() {
    const clock = new THREE.Clock();
    TWEEN.update();
    controls.update();

    requestAnimationFrame(animate);

    render();
}

init();
animate();
