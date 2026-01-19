function toggleFormFields() {
    const isLawyer = document.querySelector('input[name="prof_type"][value="lawyer"]').checked;
    const lawyerFields = document.getElementById('fields-lawyer');
    const bailiffFields = document.getElementById('fields-bailiff');

    if (isLawyer) {
        lawyerFields.classList.remove('hidden-section');
        bailiffFields.classList.add('hidden-section');
    } else {
        lawyerFields.classList.add('hidden-section');
        bailiffFields.classList.remove('hidden-section');
    }
}