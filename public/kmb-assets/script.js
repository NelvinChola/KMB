// Sidebar Toggle
document.addEventListener('DOMContentLoaded', function() {
    const sidebarCollapse = document.getElementById('sidebarCollapse');
    if (sidebarCollapse) {
        sidebarCollapse.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('content').classList.toggle('active');
        });
    }

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Add active class to current page in navigation
    const currentLocation = location.pathname;
    const menuItems = document.querySelectorAll('.nav-link');
    const menuLength = menuItems.length;
    
    for (let i = 0; i < menuLength; i++) {
        if (menuItems[i].getAttribute('href') === currentLocation) {
            menuItems[i].classList.add('active');
        }
    }
});

// Charts
function initCharts() {
    // Traffic Chart
    const trafficCtx = document.getElementById('trafficChart');
    if (trafficCtx) {
        const trafficChart = new Chart(trafficCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Website Visits',
                    data: [12000, 19000, 15000, 25000, 22000, 30000, 28000, 35000, 32000, 40000, 38000, 45000],
                    borderColor: '#e41c1c',
                    backgroundColor: 'rgba(228, 28, 28, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Unique Visitors',
                    data: [8000, 12000, 10000, 18000, 15000, 22000, 20000, 28000, 25000, 32000, 30000, 38000],
                    borderColor: '#198a00',
                    backgroundColor: 'rgba(25, 138, 0, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    }

    // Content Distribution Chart
    const contentCtx = document.getElementById('contentChart');
    if (contentCtx) {
        const contentChart = new Chart(contentCtx, {
            type: 'doughnut',
            data: {
                labels: ['Music', 'Videos', 'News', 'Events'],
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#198a00',
                        '#e41c1c',
                        '#ff9d00',
                        '#000000'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });
    }
}

// Initialize charts when page loads
document.addEventListener('DOMContentLoaded', initCharts);