// Creating a bool to keep the sidebar open or close between views
localStorage.getItem('sidebarOpen') === null ? localStorage.setItem('sidebarOpen', 'false') : 0;
// Display/Hide sidebar
applyToggle();

//Time to start the animation of the home page
let matrixInterval;

// Better safe than sorry
function addSafeEventListener(id, event, callback) {
    const element = document.getElementById(id);
    if (element) {
        element.addEventListener(event, callback);
        return true;
    }
    return false;
}

// Waiting for the DOM to be loaded, then adding the events listener safely using addSafeEventListener function
document.addEventListener('DOMContentLoaded', () => {
    // DashBoard buttons
    addSafeEventListener('users', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=user-showAll';
    });

    addSafeEventListener('accounts', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=account-showFor';
    });

    addSafeEventListener('contracts', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=contract-showFor';
    });

    // Side-bar buttons
    addSafeEventListener('side-bar-user-create', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=user-create';
    });

    addSafeEventListener('side-bar-account-create', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=account-create';
    });

    addSafeEventListener('side-bar-contract-create', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=contract-create';
    });

    addSafeEventListener('side-bar-user-list', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=user-showAll';
    });

    addSafeEventListener('side-bar-account-list', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=account-showFor';
    });

    addSafeEventListener('side-bar-contract-list', 'click', () => {
        window.location.href = window.location.href.replace(/\?.*$/, '') + '?action=contract-showFor';
    });

    addSafeEventListener('toggle-sidebar', 'click', () => {
        if (localStorage.getItem('sidebarOpen') == 'true') {
            localStorage.setItem('sidebarOpen', 'false');
            setTimeout(matrixHome, 10);
        } else {
            localStorage.setItem('sidebarOpen', 'true');
        }
        applyToggle(); //apply new status
    })

    //call matrix when the DOM is loaded
    matrixHome();
});

//Toggle the Sidebar
function applyToggle() {
    if (localStorage.getItem('sidebarOpen') == 'true') {
        document.getElementById('side-bar').style.borderRight = '1px solid var(--dark-green)';
        document.getElementById("side-bar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById('toggle-sidebar').innerHTML = '✕';

    } else {
        document.getElementById('side-bar').style.borderRight = 'none';
        document.getElementById("side-bar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.getElementById('toggle-sidebar').innerHTML = '☰';
    }
}

//Matrix
function matrixHome() {
    // Check if we need to restart the animation (resize of the window or refresh of the page)
    if (matrixInterval) {
        clearInterval(matrixInterval);
        // Deleting old stuff
        const container = document.getElementById('matrixCanvas');
        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }
    }

    //We are on the home page, display matrix
    if (window.location.search === "" || window.location.search === "?home" || window.location.search === "?action=home") {
        const canvas = document.createElement('canvas');
        const container = document.getElementById('matrixCanvas');
        container.appendChild(canvas);

        //set canva to the side of the container
        const resizeCanvas = () => {
            canvas.width = container.offsetWidth;
            canvas.height = container.offsetHeight;
        };

        resizeCanvas();
        window.addEventListener('resize', resizeCanvas); //Just in case

        let ctx = canvas.getContext('2d');
        let possibleLetters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789@#$%^&*()_+-=[]{}|;:,.<>?";
        let fontSize = 12;
        let columns = Math.floor(canvas.width / fontSize); //dividing width by fontSize to know how many column I need.
        let drops = Array(columns).fill().map(() => Math.floor(Math.random() * canvas.height / fontSize) * -1);

        function draw() {
            ctx.fillStyle = 'rgba(0, 0, 0, 0.05)'; // Fade effect for trail
            ctx.fillRect(0, 0, canvas.width, canvas.height);

            ctx.fillStyle = '#0f0';
            ctx.font = `${fontSize}px monospace`;

            for (let i = 0; i < drops.length; i++) {
                const text = possibleLetters[Math.floor(Math.random() * possibleLetters.length)];
                const x = i * fontSize;
                const y = drops[i] * fontSize;

                ctx.fillText(text, x, y);

                if (Math.random() > 0.90) {
                    ctx.fillStyle = '#fff'; // Highlight random characters
                    ctx.fillText(text, x, y);
                    ctx.fillStyle = '#0f0';
                }

                drops[i]++;

                // Reset when reaching bottom of canva with some randomness for nice effect
                if (drops[i] * fontSize > canvas.height && Math.random() > 0.90) {
                    drops[i] = 0;
                }
            }
        }
        matrixInterval = setInterval(draw, 35);
    }
}