import Alpine from 'alpinejs';
window.Alpine = Alpine;

Alpine.data('vehicleGallery', () => ({
    open: false,
    current: 0,
    vehicle: null,

    get images() {
        return this.vehicle?.images || [];
    },

    get currentImage() {
        if (!this.images.length) return '';
        return '/storage/' + this.images[this.current];
    },

    openVehicle(vehicle) {
        this.vehicle = vehicle;
        this.current = 0;
        this.open = true;
        document.body.style.overflow = 'hidden';
    },

    close() {
        this.open = false;
        document.body.style.overflow = '';
    },

    next() {
        if (!this.images.length) return;
        this.current = (this.current + 1) % this.images.length;
    },

    prev() {
        if (!this.images.length) return;
        this.current = (this.current - 1 + this.images.length) % this.images.length;
    },

    go(index) {
        this.current = index;
    },
}));

Alpine.start();
