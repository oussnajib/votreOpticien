const services = {
    eye:[
        "Eye Care",
        "Eye Exam",
        "Eye Glasses",
        "Eye Lenses",
        "Eye Repair",
        "Eye Sunglasses",
        "Eye Other"
    ],
    exam: [
        "Vision Test",
        "Eye Pressure Test",
        "Retina Examination",
        "Children Eye Exam"
    ],

    glasses: [
        "Single Vision",
        "Progressive",
        "Reading Glasses",
        "Computer Glasses"
    ],

    lenses : [
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
// cards click event
const cards = document.querySelectorAll(".service-card");
const container = document.getElementById("subServiceList");
const section = document.getElementById("subServices");

cards.forEach(card=>{

    card.addEventListener("click",function(){

        cards.forEach(c => c.classList.remove("active"));
        this.classList.add("active");

        const service=this.dataset.service;

        container.innerHTML="";

        services[service].forEach(item=>{

            container.innerHTML += `
                <div class="col-md-4">
                    <div class="form-check border rounded p-3">
                        <input class="form-check-input"
                               type="radio"
                               name="subservice"
                               value="${item}">
                        <label class="form-check-label">
                            ${item}
                        </label>
                    </div>
                </div>
            `;

        });

        section.classList.remove("d-none");

        const radios = document.querySelectorAll('input[name="subservice"]');

        radios.forEach(radio => {

            radio.addEventListener("change", function () {
                document.getElementById("continueBtn").disabled = false;

            });

        });

    });

});
// continue button
const continueBtn = document.getElementById("continueBtn");
const steps = document.querySelectorAll(".step");
let currentStep = 0;

continueBtn.addEventListener("click", function(){

    document.getElementById("step1").style.display="none";
    const step2=document.getElementById("step2");
    
    step2.style.display="block";
    setTimeout(function(){
        step2.classList.add("show");
    },10);

    if( currentStep < steps.length - 1){

        steps[currentStep].classList.remove("active");

        currentStep++;

        steps[currentStep].classList.add("active");

        const icon = steps[currentStep].querySelector(".circle");
        icon.innerHTML = '<i class="bi bi-check-lg"></i>';
    }
        
   
});
// back button
document.getElementById("backBtn").addEventListener("click",function(){

    const step2=document.getElementById("step2");
    step2.classList.remove("show");
    setTimeout(function(){
        step2.style.display="none";
        document.getElementById("step1").style.display="block";
    },500);

    if( currentStep > 0){

        steps[currentStep].classList.remove("active");

        currentStep--;

        steps[currentStep].classList.add("active");

        const icon = steps[currentStep].querySelector(".circle");
        icon.innerHTML = '<i class="bi bi-check-lg"></i>';
    }

});
// date card click
const datesContainer = document.getElementById("dates");
const today = new Date();

for (let i = 0; i < 12; i++) {

    const date = new Date(today);
    date.setDate(today.getDate() + i);

    const dayName = date.toLocaleDateString( "en-US" , { weekday: "short" });
    const dayNumber = date.getDate();
    const monthName = date.toLocaleDateString( "en-US" , { month: "short" });
    
    const horaire = document.getElementById("horaire");
    const card = document.createElement("div");
    card.classList.add("date-card");
    card.innerHTML = `
        <span class="day">${dayName}</span>
        <span class="number">${dayNumber}</span>
        <span class="month">${monthName}</span>
    `;

    card.addEventListener("click", function () {
        document.querySelectorAll(".date-card").forEach(c => {c.classList.remove("active")

        });
        card.classList.add("active");
        horaire.classList.remove("d-none");
    });
    
    datesContainer.appendChild(card);

    const dayofWeek = date.getDay(); // 0 = dimanche 1 = lundi....
    if (dayofWeek === 0) {
        card.classList.add("disabled");
    }else{
        card.addEventListener("click", () => {
            afficherHoraire(dayofWeek);
        })
    }

}
function afficherHoraire( day){
    let heures=[];

    if (day ===1){
        heures = [
            "14:00",
            "15:00",
            "16:00",
            "17:00",
            "18:00",
            "19:00"
        ];
    }else{
        heures = [
            "09:00",
            "10:00",
            "11:00",
            "12:00",
            "13:00",
            "14:00",
            "15:00",
            "16:00",
            "17:00",
            "18:00",
            "19:00"
        ];
    }
}



