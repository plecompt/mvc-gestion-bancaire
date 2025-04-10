document.querySelectorAll('nav-div').forEach(div => {
    div.addEventListener('click', function() {
        const action = this.getAttribute('data-action');
        
        // Utilisation de URLSearchParams pour une gestion robuste
        const baseUrl = window.location.origin + window.location.pathname;
        const params = new URLSearchParams(window.location.search);
        params.set('action', action);
        
        window.location.href = baseUrl + '?' + params.toString();
    });
});