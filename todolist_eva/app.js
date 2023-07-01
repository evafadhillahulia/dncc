document.addEventListener('DOMContentLoaded', function() {
    const flyContainer = document.querySelector('.fly-container');
    const desktopWidth = window.innerWidth;
    const desktopHeight = window.innerHeight;

    function createFlyingObject() {
        const objects = ['book', 'pen', 'ball', 'car'];
        const randomObject = objects[Math.floor(Math.random() * objects.length)];
        const fly = document.createElement('div');
        fly.classList.add('fly', randomObject);
        fly.style.left = Math.random() * (desktopWidth - 100) + 'px';
        fly.style.top = Math.random() * (desktopHeight - 100) + 'px';
        flyContainer.appendChild(fly);

        setTimeout(() => {
            fly.remove();
        }, 10000);
    }

    setInterval(createFlyingObject, 2000);
});
