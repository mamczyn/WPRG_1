// <script>
//     function loadAppointments(filter, showSuccess, headerText) {
//     var tableBody = document.querySelector("#appointments-table tbody");
//     $.ajax({
//     url: '../users/model/fetch_appointments.php',
//     method: 'POST',
//     data: { filter: filter },
//     success: function(data) {
//     tableBody.innerHTML = data;
//     document.getElementById('appointmentsHeader').innerText = headerText;
// },
//     error: function() {
//     tableBody.innerHTML = '<tr><td colspan="4">No appointments found</td></tr>';
// }
// });
// }
//
//     function cancelAppointment(appointment_id) {
//     $.ajax({
//         url: '../users/model/cancel_appointment.php',
//         method: 'POST',
//         data: { appointment_id: appointment_id },
//         success: function() {
//             loadAppointments('scheduled', true, 'Zaplanowane Wizyty');
//         },
//         error: function() {
//             alert('There was an error cancelling the appointment');
//         }
//     });
// }
// </script>
// <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js"></script>
// <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.js"></script>
// <script>
//     document.addEventListener('DOMContentLoaded', function() {
//     var calendarEl = document.getElementById('calendar');
//     var patientId = calendarEl.getAttribute('data-patient-id');
//
//     var calendar = new FullCalendar.Calendar(calendarEl, {
//     initialView: 'timeGridWeek',
//     events: function(fetchInfo, successCallback, failureCallback) {
//     $.ajax({
//     url: '../users/model/availability.php',
//     method: 'POST',
//     data: {
//     start: fetchInfo.startStr,
//     end: fetchInfo.endStr
// },
//     success: function(data) {
//     successCallback(JSON.parse(data));
// },
//     error: function() {
//     failureCallback();
// }
// });
// },
//     selectable: true,
//     select: function(info) {
//     var title = prompt('Enter Appointment Title:');
//     if (title) {
//     $.ajax({
//     url: '../users/model/book_appointment.php',
//     method: 'POST',
//     data: {
//     patient_id: patientId,
//     start: info.startStr,
//     end: info.endStr,
//     title: title
// },
//     success: function() {
//     calendar.refetchEvents();
//     Swal.fire('Success', 'Appointment booked successfully', 'success');
// },
//     error: function() {
//     Swal.fire('Error', 'There was an error booking the appointment', 'error');
// }
// });
// }
// }
// });
//
//     calendar.render();
// });
// </script>