var sec = 60;
var Timer = $("#Timer");
window.onload = countDown;


function countDown() {
    Timer.html(sec);
    if (sec <= 0) {
        $("#Timer").removeAttr("disabled");
        Timer.html("Resend Verification Code");
    }
    sec -= 1;
    window.setTimeout(countDown, 1000);
}

function getInputId(index) {
    return document.getElementById('otp' + index);
}

function onKeyUpEvent(index, event) {
    const eventCode = event.which || event.keyCode;
    if (getInputId(index).value.length === 1) {
        if (index !== 6) {
            getInputId(index + 1).focus();
        } else {
            getInputId(index).blur();
            var otpInputs = $(".input-otp");
            sumValue(otpInputs);
        }
    }
    if (eventCode === 8 && index !== 1)
    getInputId(index - 1).focus();
}

function onFocusEvent(index) {
    for (item = 1; item < index; item++) {
        const currentElement = getInputId(item);
        if (!currentElement.value) {
            currentElement.focus();
            break;
        }
    }
}

function sumValue(inputs) {
    // Sum of input values
    sum  = [].map.call(inputs, function( input ) {
        return input.value;
    }).join('');
    // Show alert
    alert(sum); 
    // Reset inputs
    for(var i=0; i<inputs.length ; i++){
        inputs[i].value = "" ;
     }
}

$(".toggle-password").click(function () {
    var passwordInput = $("#password");
    $(this).toggleClass("mdi-eye mdi-eye-off");
    if (passwordInput.attr("type") == "password") {
        passwordInput.attr("type", "text");
    } else {
        passwordInput.attr("type", "password");
    }
});

particlesJS('particles', {
    "particles": {
        "number": {
            "value": 40,
            "density": {
                "enable": true,
                "value_area": 500
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": ["circle", "star"],
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            }
        },
        "opacity": {
            "value": 1,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 1,
                "opacity_min": 0,
                "sync": false
            }
        },
        "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 3,
                "size_min": 0.2,
                "sync": true
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 600
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": false,
                "mode": "bubble"
            },
            "onclick": {
                "enable": false,
                "mode": "repulse"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 250,
                "size": 0,
                "duration": 2,
                "opacity": 0,
                "speed": 3
            },
            "repulse": {
                "distance": 400,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});