function reservationWizard() {
  return {
    step: 1,
    selectedCar: null,
    pickupDate: '',
    returnDate: '',
    paymentMethod: '',

    get totalDays() {
      if (!this.pickupDate || !this.returnDate) return 0;
      const start = new Date(this.pickupDate);
      const end = new Date(this.returnDate);

      if (isNaN(start.getTime()) || isNaN(end.getTime())) return 0;

      const diff = (end - start) / (1000 * 60 * 60 * 24);
      return diff > 0 ? Math.ceil(diff) : 0;
    },

    get totalPrice() {
      if (!this.selectedCar || !this.totalDays) return 0;
      return this.totalDays * this.selectedCar.price;
    }
  }
}

document.addEventListener('alpine:init', () => {
  Alpine.data('reservationWizard', reservationWizard);
});