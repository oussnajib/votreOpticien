<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Make an Appointment</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="./rendezvous.css">

</head>

<body>

    <section class="appointment py-5">

        <div class="container" >

            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

                <div class="row g-0">

                    <!-- ================= Sidebar ================= -->

                    <div class="col-lg-3 sidebar">

                        <h2 class="fw-bold mb-5">Make an appointment</h2>

                        <div class="steps">

                            <div class="step active">

                                <div class="circle">
                                    <i class="bi bi-check-lg"></i>
                                </div>

                                <span>Select a Service</span>

                            </div>

                            <div class="step">

                                <div class="circle">
                                    2
                                </div>

                                <span>Choose Date & Time</span>

                            </div>

                            <div class="step">

                            <div class="circle">
                                3
                            </div>

                            <span>Enter Patient Information</span>

                            </div>

                            <div class="step">

                            <div class="circle">
                                4
                            </div>

                            <span>Review & Confirm</span>

                            </div>

                        </div>

                    </div>

                    <!-- ================= Content ================= -->
                    
                    <!-- STEP 1 -->

                    <div class="col-lg-9 p-5" id="step1">

                        <h2 class="fw-bold mb-2">
                            Select a Service
                        </h2>

                        <p class="text-muted mb-5">
                            Please choose the service you need.
                        </p>

                        <div class="row g-4">

                            <div class="col-md-4">

                                <div class="service-card" data-service="eye">

                                    <i class="bi bi-eye service-icon"></i>

                                    <h5>Eye Examination</h5>

                                    <p>Complete vision check.</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="service-card" data-service="glasses">

                                    <i class="bi bi-eyeglasses service-icon"></i>

                                    <h5>Glasses</h5>

                                    <p>Choose your new glasses.</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="service-card" data-service="lenses">

                                    <i class="bi bi-circle service-icon"></i>

                                    <h5>Contact Lenses</h5>

                                    <p>Lens consultation.</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="service-card" data-service="repair">

                                    <i class="bi bi-tools service-icon"></i>

                                    <h5>Repair</h5>

                                    <p>Repair your glasses.</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="service-card" data-service="sunglasses">

                                    <i class="bi bi-sunglasses service-icon"></i>

                                    <h5>Sunglasses</h5>

                                    <p>Summer collection.</p>

                                </div>

                            </div>

                            <div class="col-md-4">

                                <div class="service-card" data-service="other">

                                    <i class="bi bi-chat-dots service-icon"></i>

                                    <h5>Other</h5>

                                    <p>Another request.</p>

                                </div>

                            </div>

                        </div>
                        <div id="subServices" class="mt-5 d-none">

                            <h4 class="fw-bold mb-3">Select a Sub-service</h4>

                            <div id="subServiceList" class="row g-3">

                            </div>

                        </div>
                        <div class="text-end mt-5">

                            <button id="continueBtn" class="btn btn-success px-5 py-3 rounded-pill" disabled>Continue
                                <i class="bi bi-arrow-right ms-2"></i>
                            </button>

                        </div>

                    </div>

                    <!-- STEP 2 -->

                    <div class="col-lg-9 p-5" id="step2">

                        <h2 class="fw-bold mb-2">Choisir Date & Time</h2>

                        <p class="text-muted mb-4">Select your preferred date and time.</>

                        <!-- Ici tu mettras les dates et les heures -->
                         <h4 class="fw-bold mb-3">Select Date</h4>

                        <div id="dates" >
                            
                        </div>
                        
                        <div id="horaire" class=" horaire mt-5 d-none">

                            <h4 class="fw-bold mb-3">Select a hour</h4>

                            <div id="timeSlots" class="row g-3">
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">09:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">10:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">11:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">12:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">13:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">14:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">15:00</button>
                                </div>
                                <d class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">16:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">17:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">18:00</button>
                                </div>
                                <div class="col-md-3">
                                    <button class="btn btn-outline-secondary w-100 time-btn">19:00</button>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-5">

                                <button id="backBtn"
                                        class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left"></i>
                                    Back
                                </button>
                            </div>
                            <div class="text-end mt-5">

                                <button id="continueBtn" class="btn btn-success px-5 py-3 rounded-pill" disabled>Continue
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>

                            </div>
                        </div>

                        

                    </div>

                </div>
            </div>
        </div>

    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="./rendezvous.js"></script>
</body>

</html>