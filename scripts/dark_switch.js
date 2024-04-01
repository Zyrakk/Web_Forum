const switchButton = document.getElementById('switch');

if (localStorage.getItem("tema") === null) {
    var tema = 'light';
    document.body.classList.add('light'); // Add initial theme class to the HTML body
} else {
    var tema = localStorage.getItem("tema");
    document.body.classList.add(tema); // Add initial theme class to the HTML body
}

function changeTheme() {
    if (tema === 'light') {
        document.body.classList.remove('light');
        document.body.classList.add('dark');
        tema = 'dark';
    } else {
        document.body.classList.remove('dark');
        document.body.classList.add('light');
        tema = 'light';
    }
}

switchButton.addEventListener('click', () => {
    changeTheme();
    switchButton.classList.toggle('active');
    localStorage.setItem("tema", tema);
});