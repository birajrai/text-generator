(function () {
    /*
      REUSABLE FUNCTIONS.
   */
    var numberFormat = function (number) {
        number = String(number);
        return number.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    };

    var animateNumber = function (element) {
        var self = this;
        self.element = element;
        self.number = self.element.getAttribute('data-number');
        self.duration = self.element.getAttribute('data-duration');
        self.updateRate = 1000 / 60;
        self.totalUpdates = Math.ceil(self.duration / self.updateRate);
        self.updates = 0;
        self.update = function () {
            self.element.innerText = numberFormat(Math.round((self.number / self.totalUpdates) * self.updates));
            if (self.updates < self.totalUpdates) {
                ++self.updates;
                setTimeout(self.update, self.updateRate);
            }
        };
        self.update();
    };

    var httpRequest = function (method, url, headers, post, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            this.readyState == 4 && callback(this.responseText);
        };
        request.open(method, url, true);
        for (var i = 0; i < headers.length; i += 2) {
            request.setRequestHeader(headers[i], headers[i + 1]);
        }
        request.send(post);
    };

    var postRequest = function (url, post, callback) {
        httpRequest(
            'POST',
            url,
            ['X-Requested-With', 'XMLHttpRequest', 'Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8'],
            post,
            callback
        );
    };

    /*
      MAIN FUNCTIONS.
   */
    var generateText = function (input, output) {
        postRequest(window.location.href + '/ajax', 'text=' + input.value, function (data) {
            output.value = data;
        });
    };

    var clearText = function (input, output) {
        input.value = output.value = '';
    };

    window.setGeneratorEvents = function (generateId, clearId, inputId, outputId) {
        document.getElementById(generateId).onclick = function () {
            generateText(document.getElementById(inputId), document.getElementById(outputId));
        };
        document.getElementById(clearId).onclick = function () {
            clearText(document.getElementById(inputId), document.getElementById(outputId));
        };
    };

    window.animateNumbers = function (className) {
        for (var elements = document.getElementsByClassName(className), i = 0; i < elements.length; i++) {
            new animateNumber(elements[i]);
        }
    };
})();
