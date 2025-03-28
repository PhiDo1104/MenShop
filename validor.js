function Validator(options) {
    var selectorRules = {};
    function validate(inputElement, rule) {
        var errorElement = formElement.parentElement.querySelector('.form-message');
        console.log(formElement.parentElement);
        
        var errorMessage = rule.test(inputElement.value);

        var rules = selectorRules[rule.selector];

        for (var i = 0; i < rules.length; ++i) {
            errorMessage = rules[i](inputElement.value)
            if (errorMessage) {
                break;
            }
        }
        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.parentElement.classList.add('invalid');
            
        } else {
            errorElement.innerText = '';
            inputElement.parentElement.classList.remove('invalid');

        }
    }
    var formElement = document.querySelector(options.form);
    
    if (formElement) {
        options.rules.forEach(function (rule) {
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement, rule);
                }
                inputElement.oninput = function () {
                    var errorElement = formElement.parentElement.querySelector('.form-message');
                    errorElement.innerText = '';
                    inputElement.parentElement.classList.remove('invalid');
                }
            }
        });
    }
}

Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : message || "Vui lòng nhập trường này"
        }
    }
}

Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || "Vui lòng nhập email hợp lệ";
        }
    }
}

Validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.length >= min ? undefined : message || `Vui lòng nhập tối thiểu ${min} ký tự`;
        }
    }
}

Validator.isConfirm = function (selector, grtConfirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === grtConfirmValue() ? undefined : message || `Giá trị nhập vào không chính xác`;
        }
    }
}