@extends('layouts.app')

@section('title', 'Appointment')

@push('styles')
    <link rel="stylesheet" href="/css/appointment.css" />
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
@endpush

@section('content')
    <div class="container">
        <div class="head">
            <a href="./find_doctors.html" class="back-button"> ← Back </a>
            <h1>Book Appointment</h1>
            <p>Schedule your visit with our specialist</p>
        </div>

        <div class="doctor-info">
            <div class="doctor-name" id="doctorName"></div>
        </div>
        <div class="form-section">
            <form id="appointment_form">
                <div class="form-group">
                    <label for="patientName">Your Full Name <span class="required">*</span></label>
                    <input type="text" id="patientName" name="patientName" placeholder="Enter your full name" />
                </div>

                <div class="form-group">
                    <label for="phoneNumber">Phone Number <span class="required">*</span></label>
                    <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="Enter your phone number" />
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" />
                </div>

                <div class="date-time-row">
                    <div class="form-group">
                        <label for="appointmentDate">Preferred Date</label>
                        <input type="date" id="appointmentDate" name="appointmentDate" />
                    </div>
                    <div class="form-group">
                        <label for="appointmentTime">Preferred Time</label>
                        <select id="appointmentTime" name="appointmentTime">
                            <option value="">Select a time</option>
                            <option value="09:00">9:00 AM</option>
                            <option value="09:30">9:30 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="10:30">10:30 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="11:30">11:30 AM</option>
                            <option value="14:00">2:00 PM</option>
                            <option value="14:30">2:30 PM</option>
                            <option value="15:00">3:00 PM</option>
                            <option value="15:30">3:30 PM</option>
                            <option value="16:00">4:00 PM</option>
                            <option value="16:30">4:30 PM</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="submit-button">Book Appointment</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
    <script>
        document.getElementById("doctorName").textContent = localStorage.getItem('selectedDoctor');
        const form = document.querySelector('form');
        const name = document.querySelector('input[name="patientName"]');
        const email = document.querySelector('input[name="email"]');
        const phone = document.querySelector('input[name="phoneNumber"]');
        const date = document.querySelector('input[name="appointmentDate"]');
        const time = document.querySelector('select[name="appointmentTime"]');
        const phonepattern = /^(010|011|012|015)[0-9]{8}$/;
        const emailpattern = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.(com|net|org|edu)$/;
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (name.value !== "" && email.value !== "" && phone.value !== "" && date.value !== "" && time.value !==
                "") {
                if (name.value.length >= 3 && isNaN(name.value)) {
                    if (emailpattern.test(email.value)) {
                        if (phone.value != '' && phonepattern.test(phone.value)) {
                            if (date.value !== "" && time.value !== "") {
                                swal("Good job!", "Appointment Booked Successfully", "success");
                                form.reset();
                            }
                        }
                    }
                }
            } else {
                const div = document.createElement('div');
                document.querySelectorAll('.form-group').forEach(group => group.appendChild(div));
                div.innerText = "Please fill all required fields correctly.";
                div.classList.add('error-message');
                setTimeout(() => {
                    div.remove();
                }, 5000);
            }
        });
    </script>
@endpush
