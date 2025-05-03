// Create floating volcano dots
function createVolcanoDots() {
    const container = document.getElementById('volcano-dots');
    const dotCount = 15;
    
    for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('div');
        dot.className = 'volcano-dot';
        
        // Random position
        const left = Math.random() * 100;
        const bottom = Math.random() * 20;
        const size = 2 + Math.random() * 3;
        const delay = Math.random() * 5;
        const duration = 3 + Math.random() * 4;
        
        dot.style.left = `${left}%`;
        dot.style.bottom = `${bottom}%`;
        dot.style.width = `${size}px`;
        dot.style.height = `${size}px`;
        dot.style.animationDelay = `${delay}s`;
        dot.style.animationDuration = `${duration}s`;
        
        container.appendChild(dot);
    }
}

// Modal functionality
document.addEventListener('DOMContentLoaded', function() {
    createVolcanoDots();
    
    const orderBtn = document.getElementById('orderBtn');
    const orderModal = document.getElementById('orderModal');
    const closeModal = document.getElementById('closeModal');
    const orderForm = document.getElementById('orderForm');
    const successModal = document.getElementById('successModal');
    const closeSuccessModal = document.getElementById('closeSuccessModal');
    
    // Open order modal
    orderBtn.addEventListener('click', function() {
        orderModal.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
    
    // Close modals
    closeModal.addEventListener('click', function() {
        orderModal.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
    
    closeSuccessModal.addEventListener('click', function() {
        successModal.classList.remove('active');
        orderModal.classList.remove('active');
        document.body.style.overflow = 'auto';
    });
    
    // Close modals when clicking outside
    [orderModal, successModal].forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });
    
    // Form submission
    orderForm.addEventListener('submit', function(e) {
        e.preventDefault();
    
        const formData = new FormData(orderForm);
    
        fetch('send_order.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error('Network error');
            return response.text();
        })
        .then(result => {
            if (result.trim() === "OK") {
                orderModal.classList.remove('active');
                successModal.classList.add('active');
                orderForm.reset();
            } else {
                alert("Ошибка отправки заказа: " + result);
            }
        })
        .catch(() => {
            alert("Ошибка связи с сервером. Попробуйте позже.");
        });
    });
});