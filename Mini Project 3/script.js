function calculateTotal() {
    var startDate = new Date(document.getElementById('start_date').value);
    var endDate = new Date(document.getElementById('end_date').value);
    var timeDiff = endDate.getTime() - startDate.getTime();
    var daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24)); // Perbedaan hari
    var price = document.getElementById('price').value;
    var totalPrice = daysDiff * price; // Harga total
    document.getElementById('total_price').value = totalPrice;
}
