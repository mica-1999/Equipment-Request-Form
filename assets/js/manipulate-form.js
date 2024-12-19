function fade_in_out(disappear,appear){
    
    disappear.style.transition = 'opacity 0.5s ease-out'; // Transition out
    appear.style.transition = 'opacity 0.5s ease-in'; // Transition in

    disappear.style.opacity = 0; // Fade out "Dados Gerais"
    appear.style.opacity = 1; // Fade in "Equipamentos"

    setTimeout(function() {
        // Set display style after fade-out
        disappear.style.display = 'none';
        appear.style.display = 'block';
    }, 500); // Delay for transition duration

    // Update the step indicators to mark the second step
    if(document.getElementById("dados-gerais") == disappear && document.getElementById("equipamentos") == appear){
        const steps = document.querySelectorAll(".wizard-step");
        steps.forEach(function(step) {
            step.classList.remove("active"); // Remove active class
        });
        steps[1].classList.add("active"); // Mark second step as active

    }
    else if(document.getElementById("equipamentos") == disappear && document.getElementById("revisao") == appear){
        const steps = document.querySelectorAll(".wizard-step");
        steps.forEach(function(step) {
            step.classList.remove("active"); // Remove active class
        });
        steps[2].classList.add("active"); // Mark second step as active
    }
    else if(document.getElementById("revisao") == disappear && document.getElementById("equipamentos") == appear){
        const steps = document.querySelectorAll(".wizard-step");
        steps.forEach(function(step) {
            step.classList.remove("active"); // Remove active class
        });
        steps[1].classList.add("active"); // Mark second step as active
    }
    else if(document.getElementById("equipamentos") == disappear && document.getElementById("dados-gerais") == appear){
        const steps = document.querySelectorAll(".wizard-step");
        steps.forEach(function(step) {
            step.classList.remove("active"); // Remove active class
        });
        steps[0].classList.add("active"); // Mark second step as active
    }
    else{
        console.log("Entrei aqui");
    }
    
}


document.addEventListener('DOMContentLoaded', function() {
    var itemCounter = 2; // Counter for item rows



    document.getElementById("proximo-equipamentos").addEventListener("click", function(e) {
		e.preventDefault(); // Prevent default behavior

        fade_in_out(document.getElementById("dados-gerais"),document.getElementById("equipamentos"));
    });

    document.getElementById("anterior-dados-gerais").addEventListener("click", function(e) {
		e.preventDefault(); // Prevent default behavior

        fade_in_out(document.getElementById("equipamentos"),document.getElementById("dados-gerais"));
    });

    document.getElementById("proximo-revisao").addEventListener("click", function(e) {
		e.preventDefault(); // Prevent default behavior

        fade_in_out(document.getElementById("equipamentos"),document.getElementById("revisao"));
    });

    document.getElementById("anterior-equipamentos").addEventListener("click", function(e) {
		e.preventDefault(); // Prevent default behavior

        fade_in_out(document.getElementById("revisao"),document.getElementById("equipamentos"));
    });
    





    // Event listener for adding a new item
	document.getElementById("add-new-item").addEventListener("click", function() {
		const itemRow = document.getElementById("item-row");
		const newItemRow = itemRow.cloneNode(true); // Clone the item row
		const inputs = newItemRow.querySelectorAll('input');


		inputs.forEach(function(input) {
			const originalId = input.id;
			const baseId = originalId.replace(/-\d+$/, ''); // Remove any existing number suffix
			const newId = `${baseId}-${itemCounter}`;
			input.id = newId;

			const label = newItemRow.querySelector(`label[for='${originalId}']`);
			if (label) {
				label.setAttribute('for', newId); // Update label 'for' attribute
			}
			const errorMessage = newItemRow.querySelector(`#${originalId}-error`);
			if (errorMessage) {
				errorMessage.id = `${newId}-error`; // Update error message ID
			}
		});

		inputs.forEach(function(input) {
			input.value = ''; // Clear input values
		});

		// Reset any error messages in the new row
		const errorMessages = newItemRow.querySelectorAll('.error-message');
		errorMessages.forEach(function(errorMessage) {
			errorMessage.textContent = '';  // Clear error message text
			errorMessage.style.display = 'none';  // Hide error message
		});

		itemCounter++;
		document.getElementById("items-container").appendChild(newItemRow); // Append new item row
		const requiredFields = newItemRow.querySelectorAll('input[required], select[required]');
	});


        
    // Clean button: clear input values and reset styles
	document.querySelector("#items-container").addEventListener('click', function(event) {
		if (event.target && event.target.closest('.clean-btn')) {
			const formRow = event.target.closest('.form-row');
			const inputs = formRow.querySelectorAll('input');

			inputs.forEach(function(input) {
				input.value = ''; // Clear the input value
				resetInputStyles(input); // Reset the input styles (pass each input individually)
			});
		}
	});

	// Event listener for deleting an item
	document.querySelector("#items-container").addEventListener('click', function(event) {
		if (event.target && event.target.closest('.delete-btn')) {
			const formRow = event.target.closest('.form-row');
			
			// Ensure there's more than one row before allowing deletion
			const formRows = document.querySelectorAll("#items-container .form-row");

			if (formRows.length > 1) {
				formRow.remove(); // Remove the row
			}
		}
	});

});