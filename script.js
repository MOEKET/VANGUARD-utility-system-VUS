document.addEventListener('DOMContentLoaded', function() {
    // Form submission handlers
    const incidentForm = document.getElementById('incidentForm');
    const contractorForm = document.getElementById('contractorForm');
    const surveyorForm = document.getElementById('surveyorForm');
    const loginForm = document.getElementById('loginForm');

    if (incidentForm) {
        incidentForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateIncidentForm()) {
                this.submit();
            }
        });
    }

    if (contractorForm) {
        contractorForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateContractorForm()) {
                this.submit();
            }
        });
    }

    if (surveyorForm) {
        surveyorForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateSurveyorForm()) {
                this.submit();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            if (validateLoginForm()) {
                this.submit();
            }
        });
    }

    // Form validation functions
    function validateIncidentForm() {
        const description = document.getElementById('description').value.trim();
        const location = document.getElementById('location').value.trim();

        if (description === '' || location === '') {
            alert('Please fill in all required fields.');
            return false;
        }

        return true;
    }

    function validateContractorForm() {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const ratePerHour = document.getElementById('ratePerHour').value.trim();

        if (username === '' || password === '' || ratePerHour === '') {
            alert('Please fill in all required fields.');
            return false;
        }

        return true;
    }

    function validateSurveyorForm() {
        const incidentId = document.getElementById('incidentId').value.trim();
        const surveyorId = document.getElementById('surveyorId').value.trim();
        const inspectionDate = document.getElementById('inspectionDate').value.trim();
        const inspectionNotes = document.getElementById('inspectionNotes').value.trim();

        if (incidentId === '' || surveyorId === '' || inspectionDate === '' || inspectionNotes === '') {
            alert('Please fill in all required fields.');
            return false;
        }

        return true;
    }

    function validateLoginForm() {
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();

        if (username === '' || password === '') {
            alert('Please fill in all required fields.');
            return false;
        }

        return true;
    }
});
