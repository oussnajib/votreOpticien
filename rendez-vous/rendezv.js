console.log("TEst");

      // Variables globales
let currentStep = 1;
const continueBtn = document.getElementById("continueBtn");
const backBtn = document.getElementById("backBtn");
    // Selected values
let selectedService = "";
let selectedSubService = "";
let selectedDate = "";
let selectedTime = "";

    // Steps
const step1 = document.getElementById("step1");
const step2 = document.getElementById("step2");
const step3 = document.getElementById("step3");
const step4 = document.getElementById("step4");

// Sidebar steps
const steps = document.querySelectorAll(".step");

// Services
const cards = document.querySelectorAll(".service-card");
const subServices = document.getElementById("subServices");
const subServiceList = document.getElementById("subServiceList");

// Date & Time
const datesContainer = document.getElementById("dates");
const horaire = document.getElementById("horaire");
const timeSlots = document.getElementById("timeSlots");
// Information
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("email");
const phone = document.getElementById("phone");
const message = document.getElementById("message");

// Services et sous-services
const services = {

    eye: [
        "Eye Care",
        "Eye Exam",
        "Eye Glasses",
        "Eye Lenses",
        "Eye Repair",
        "Eye Sunglasses",
        "Eye Other"
    ],

    glasses: [
        "Single Vision",
        "Progressive",
        "Reading Glasses",
        "Computer Glasses"
    ],

    lenses: [
        "First Fitting",
        "Renewal",
        "Colored Lenses",
        "Lens Check-up"
    ],

    repair: [
        "Frame Repair",
        "Lens Replacement",
        "Nose Pads",
        "Screw Tightening"
    ],

    sunglasses: [
        "Prescription",
        "Polarized",
        "Sport"
    ],

    other: [
        "Consultation",
        "Warranty",
        "Advice"
    ]

};

// Horaires par jour
const schedules = {

    1: [ // Monday
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ],

    2: [ // Tuesday
        "09:00",
        "10:00",
        "11:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ],

    3: [ // Wednesday
        "09:00",
        "10:00",
        "11:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ],

    4: [ // Thursday
        "09:00",
        "10:00",
        "11:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ],

    5: [ // Friday
        "09:00",
        "10:00",
        "11:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ],

    6: [ // Saturday
        "09:00",
        "10:00",
        "11:00",
        "14:00",
        "15:00",
        "16:00",
        "17:00",
        "18:00",
        "19:00"
    ]

};

// Afficher une étape
function showStep(stepNumber) {

    // Cacher toutes les étapes
    step1.style.display = "none";

    if (step2) step2.style.display = "none";
    if (step3) step3.style.display = "none";
    if (step4) step4.style.display = "none";

    // Afficher l'étape demandée
    document.getElementById("step" + stepNumber).style.display = "block";

    currentStep = stepNumber;

    updateSidebar();

    updateButtons();
}

// Mettre à jour la barre latérale
function updateSidebar() {

    steps.forEach((step, index) => {

        step.classList.remove("active");

        const circle = step.querySelector(".circle");

        if (index < currentStep - 1) {

            circle.innerHTML = '<i class="bi bi-check-lg"></i>';

        } else {

            circle.textContent = index + 1;

        }

    });

    steps[currentStep - 1].classList.add("active");
}

// Mettre à jour les boutons
function updateButtons() {

    // Bouton Back
    if (currentStep === 1) {

        backBtn.classList.add("d-none");


    } else {

        backBtn.classList.remove("d-none");

    }

    // Texte du bouton Continue
    if (currentStep === 4) {

        continueBtn.innerHTML = `
            Confirm
            
            <i class="bi bi-check-lg ms-2"></i>
        `;
        
    } else {

        continueBtn.innerHTML = `
            Continue
            <i class="bi bi-arrow-right ms-2"></i>
        `;
        
    }

}

// ==========================================
// STEP 1
// ==========================================

function initStep1() {

    cards.forEach(card => {

        card.addEventListener("click", function () {

            // Réinitialiser la sélection
            cards.forEach(c => c.classList.remove("active"));

            this.classList.add("active");

            // Sauvegarder le service choisi
            selectedService = this.dataset.service;

            // Afficher les sous-services
            loadSubServices(selectedService);

        });

    });

}
function loadSubServices(service) {

    subServiceList.innerHTML = "";

    subServices.classList.remove("d-none");

    continueBtn.disabled = true;

    services[service].forEach(item => {

        const col = document.createElement("div");

        col.className = "col-md-4";

        col.innerHTML = `
            <div class="form-check border rounded p-3 h-100">

                <input
                    class="form-check-input"
                    type="radio"
                    name="subservice"
                    value="${item}">

                <label class="form-check-label">
                    ${item}
                </label>

            </div>
        `;

        subServiceList.appendChild(col);

    });

    initSubServices();

}
function initSubServices() {

    const radios = document.querySelectorAll('input[name="subservice"]');

    radios.forEach(radio => {

        radio.addEventListener("change", function () {

            selectedSubService = this.value;

            continueBtn.disabled = false;

        });

    });

}
continueBtn.addEventListener("click", function () {
    switch (currentStep) {

        case 1:
            showStep(2);
            generateDates();
            continueBtn.disabled = true;
            break;

        case 2:
            showStep(3);
            continueBtn.disabled = true;
            break;

        case 3:
            loadReview();
            showStep(4);
            continueBtn.disabled = false;
            break;

        case 4:
            saveAppointment();
            break;
    }

});
backBtn.addEventListener("click", function () {

    switch (currentStep) {

        case 2:

            showStep(1);

            continueBtn.disabled = false;

            break;
        case 3:

            showStep(2);

            continueBtn.disabled = false;
        case 4:

            showStep(3);

            continueBtn.disabled = false;

            break;

    break;

    }

});

// Génération des dates (Step 2)
// ==========================================
// STEP 2
// ==========================================

function generateDates() {

    datesContainer.innerHTML = "";

    const today = new Date();

    for (let i = 0; i < 12; i++) {

        const date = new Date(today);
        date.setDate(today.getDate() + i);

        const dayOfWeek = date.getDay();

        const card = document.createElement("div");
        card.className = "date-card";

        if (dayOfWeek === 0) {
            card.classList.add("disabled");
        }

        card.innerHTML = `
            <span class="day">
                ${date.toLocaleDateString("en-US",{weekday:"short"})}
            </span>

            <span class="number">
                ${date.getDate()}
            </span>

            <span class="month">
                ${date.toLocaleDateString("en-US",{month:"short"})}
            </span>
        `;

        card.addEventListener("click", function(){

            if(dayOfWeek === 0) return;

            selectDate(card, date, dayOfWeek);

        });

        datesContainer.appendChild(card);

    }

}
function selectDate(card, date, dayOfWeek){

    document.querySelectorAll(".date-card").forEach(c=>{

        c.classList.remove("active");

    });

    card.classList.add("active");

    selectedDate = date;

    loadHours(dayOfWeek);

}
function loadHours(day){

    horaire.classList.remove("d-none");

    timeSlots.innerHTML = "";

    continueBtn.disabled = true;

    const hours = schedules[day] || [];

    hours.forEach(hour=>{

        const button = document.createElement("button");

        button.className = "btn btn-outline-secondary time-btn";

        button.textContent = hour;

        button.addEventListener("click",function(){

            selectHour(this, hour);

        });

        timeSlots.appendChild(button);

    });

}
function selectHour(button, hour){

    document.querySelectorAll(".time-btn").forEach(btn=>{

        btn.classList.remove("btn-success");
        btn.classList.add("btn-outline-secondary");

    });

    button.classList.remove("btn-outline-secondary");
    button.classList.add("btn-success");

    selectedTime = hour;

    continueBtn.disabled = false;

}

// ==========================================
// STEP 3
// ==========================================
[firstName, lastName, email, phone].forEach(input => {

    input.addEventListener("input", validateStep3);

});
function validateStep3() {

    if (
        firstName.value.trim() !== "" &&
        lastName.value.trim() !== "" &&
        email.value.trim() !== "" &&
        phone.value.trim() !== ""
    ) {

        continueBtn.disabled = false;

    } else {

        continueBtn.disabled = true;

    }

}

function loadReview() {
    // Affichage visible
    document.getElementById("reviewService").textContent = selectedService;
    document.getElementById("reviewSubService").textContent = selectedSubService;
    document.getElementById("reviewDate").textContent = selectedDate.toLocaleDateString("fr-FR");
    document.getElementById("reviewTime").textContent = selectedTime;
    document.getElementById("reviewName").textContent = firstName.value + " " + lastName.value;
    document.getElementById("reviewEmail").textContent = email.value;
    document.getElementById("reviewPhone").textContent = phone.value;
    document.getElementById("reviewMessage").textContent = message.value || "-";

    // Inputs cachés
    document.getElementById("serviceInput").value = selectedService;
    document.getElementById("subServiceInput").value = selectedSubService;
    document.getElementById("dateInput").value =
                    selectedDate.getFullYear() + "-" +
                    String(selectedDate.getMonth() + 1).padStart(2, "0") + "-" +
                    String(selectedDate.getDate()).padStart(2, "0");
    document.getElementById("timeInput").value = selectedTime;
    document.getElementById("prenomInput").value = firstName.value;
    document.getElementById("nomInput").value = lastName.value;
    document.getElementById("emailInput").value = email.value;
    document.getElementById("telephoneInput").value = phone.value;
    document.getElementById("messageInput").value = message.value;
}
function saveAppointment() {

    console.log("saveAppointment appelée");

    const formData = new FormData();

    formData.append("service", document.getElementById("serviceInput").value);
    formData.append("sous_service", document.getElementById("subServiceInput").value);
    formData.append("date", document.getElementById("dateInput").value);
    formData.append("heure", document.getElementById("timeInput").value);
    formData.append("prenom", document.getElementById("prenomInput").value);
    formData.append("nom", document.getElementById("nomInput").value);
    formData.append("email", document.getElementById("emailInput").value);
    formData.append("telephone", document.getElementById("telephoneInput").value);
    formData.append("message", document.getElementById("messageInput").value);

    
    fetch("saveAppointment.php", {
    method: "POST",
    body: formData
})
.then(response => response.text())
.then(data => {

    if (data.trim() === "success") {
        alert("✅ Rendez-vous enregistré avec succès !");
        window.location.href = "../../votreOpticien/index.php";
    } else {
        alert(data);
    }

})
.catch(error => {
    console.error(error);
    alert("Une erreur est survenue.");
});
}
// Initialisation
showStep(1);
initStep1();