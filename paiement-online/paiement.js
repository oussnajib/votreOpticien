
function setPayTab(tabElement, panelId) {
    // Désactiver tous les onglets
    document.querySelectorAll('.pay-tab').forEach(tab => {
        tab.classList.remove('active');
    });

    // Activer l'onglet cliqué
    tabElement.classList.add('active');

    // Masquer tous les panels
    document.querySelectorAll('.pay-panel').forEach(panel => {
        panel.classList.remove('active');
    });

    // Afficher le panel correspondant
    document.getElementById(panelId).classList.add('active');
}
function processPayment() {
    const payBtn = document.getElementById("payBtn");
    const paySpinner = document.getElementById("paySpinner");

    // Activer l'état "loading"
    payBtn.classList.add("loading");

    // Simuler un délai de traitement (3 secondes)
    setTimeout(() => {
        payBtn.classList.remove("loading");
        alert("Paiement effectué avec succès ✅");
        window.location.href = "../../votreOpticien/index.php";
    }, 3000);
}
