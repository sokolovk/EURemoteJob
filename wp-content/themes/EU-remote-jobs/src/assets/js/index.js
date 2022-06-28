import lozad from 'lozad';

const observer = lozad('.lozad', {
    rootMargin: '10px 0px', // syntax similar to that of CSS Margin
    enableAutoReload: true // it will reload the new image when validating attributes changes
});
observer.observe();
