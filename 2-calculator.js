


function compute_days() {
    const dob = get_dob();

    // Check that dob is valid
    if (!dob) {
        write_answer_days("Please enter a valid date of birth.");
        return;
    }

    // Compute age in days
    const today = new Date();
    const diffTime = today - dob; // difference in milliseconds
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24)); // convert to days

    write_answer_days("<p>You are " + diffDays + " days old!</p>" +
        "<p>Your date of birth is: " + dob.toDateString() + "</p>");
}



function compute_circle(){
    const screen = get_screen_dims();
    
    // Add code here computing the radius and area of the circle



    write_answer_circle("Sorry! This function has not yet been modified by the developper. <br>" + 
    "So far we know your screen properties: " + screen.width + " x " + screen.height)
}



function check_palindrome(){
    const text_input = get_palindrome();
    
    // Add code here checking if text_input is a palindrome.
    // You must use a for loop
    // Hint: choose how to manage spaces and capital/lowercase letters!
    
    
    write_answer_palindrome("Sorry! This function has not yet been modified by the developper. <br>" + 
    "Your text: " + text_input + "<br> But I don't know if it is a palindrome?")
}



function create_fibo(){    
    // Add code here to get the wanted length. 
    // Hint: check my other codes in javascript_utils.js
    const fibo_length = "??"
    
    // Add code here to compute the fibonacci sequence.
    // The two first elements are 0 and 1
    // The next elements are the sum of the two last elements.
    // You must use arrays
    // What happens if the input number is negative?
    // What happens if the input number is 0 or 1?


    write_answer_fibo("Sorry! This function has not yet been modified by the developper. <br>" + 
    "We will eventually show you a fibonacci sequence of length " + fibo_length)
}

