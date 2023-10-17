// holds the idle duration in ms (current value = 1 minute)
var timeoutInterval = 300000;
// holds the timeout variables for easy destruction and reconstruction of the setTimeout hooks
var timeHook = null;

function initializeTimeHook() {
    // this method has the purpose of creating our timehooks and scheduling the call to our logout function when the idle time has been reached
    if (timeHook == null) {
        timeHook = setTimeout(
            function () {
                destroyTimeHook();
                logout();
            }.bind(this),
            timeoutInterval
        );
    }
}

function destroyTimeHook() {
    // this method has the sole purpose of destroying any time hooks we might have created
    clearTimeout(timeHook);
    timeHook = null;
}

function resetTimeHook() {
    // this method replaces the current time hook with a new time hook
    // console.log("timer reset");
    destroyTimeHook();
    initializeTimeHook();
}

function setupListeners() {
    // here we setup the event listener for the mouse click operation
    // console.log("Listeners activated");
    document.addEventListener(
        "click",
        function () {
            resetTimeHook();
        }.bind(this)
    );
}

function destroyListeners() {
    // here we destroy event listeners for the mouse click operation
    // console.log("Listeners deactivated");
    document.removeEventListener(
        "click",
        function () {
            resetTimeHook();
        }.bind(this)
    );
}

function logout() {
    // implement your logout operation here
    let admin_login_form = document.getElementById('admin-logout-form');
    if(admin_login_form){
        admin_login_form.submit();
    }else{
        window.location.reload();
    }
    // console.log("Logging you out due to inactivity..");
    destroyListeners();
}

// self executing function to trigger the operation on page load
(function () {
    // misc config to the pop up toasts
    // toastr.options.timeOut = 3000;
    // toastr.options.progressBar = true;

    // to prevent any lingering timeout handlers preventing memory leaks
    destroyTimeHook();
    // setup a fresh time hook
    initializeTimeHook();
    // setup initial event listeners
    setupListeners();
})();