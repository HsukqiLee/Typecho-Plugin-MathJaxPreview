document.addEventListener('DOMContentLoaded', function() {
    var textarea = document.getElementById('text');
    var preview = document.getElementById('wmd-preview');
    var timeout = null;

    if (!textarea || !preview) {
        console.error('Textarea or preview element not found');
        return;
    }

    textarea.addEventListener('input', function() {
        console.log('Input event detected');
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            if (preview.className !== 'wmd-hidetab' || document.body.className.includes('fullscreen')) {
                console.log('Rendering MathJax');
                MathJax.Hub.Queue(["Typeset", MathJax.Hub, preview]);
            } else {
                console.log('Preview is hidden, not rendering MathJax');
            }
        }, 500); // 延迟500毫秒
    });
});
