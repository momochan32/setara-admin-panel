// HTML Include Helper - Replace PHP includes with JavaScript
// This will load partials dynamically

async function includeHTML() {
    const includes = document.querySelectorAll('[data-include]');

    for (const element of includes) {
        const file = element.getAttribute('data-include');
        try {
            const response = await fetch(file);
            if (response.ok) {
                const html = await response.text();
                element.innerHTML = html;

                // Execute any scripts in the loaded HTML
                const scripts = element.querySelectorAll('script');
                scripts.forEach(script => {
                    const newScript = document.createElement('script');
                    if (script.src) {
                        newScript.src = script.src;
                    } else {
                        newScript.textContent = script.textContent;
                    }
                    document.body.appendChild(newScript);
                });
            }
        } catch (error) {
            console.error('Error loading:', file, error);
        }
    }
}

// Auto-load on page load
document.addEventListener('DOMContentLoaded', includeHTML);
