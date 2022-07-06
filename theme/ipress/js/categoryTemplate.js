var categoryTemplateScript = {
    "1": function(container, depth0, helpers, partials, data) {
        var stack1;

        return "\n                            \n" +
            ((stack1 = helpers["if"].call(depth0 != null ? depth0 : {}, (data && data.first), { "name": "if", "hash": {}, "fn": container.program(2, data, 0), "inverse": container.program(4, data, 0), "data": data })) != null ? stack1 : "");
    },
    "2": function(container, depth0, helpers, partials, data) {
        var stack1, helper;

        return "                                \n                                <div class=\"category-featured my-1 \">\n                                    <div class=\"post-img mb-3\">\n                                        <img src=\" " +
            container.escapeExpression((helpers.featuredImageHelper || (depth0 && depth0.featuredImageHelper) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.better_featured_image : depth0), { "name": "featuredImageHelper", "hash": {}, "data": data })) +
            " \" alt=\"\" class=\"\">\n                                    </div>\n                                    <div class=\"post-text mw-50 d-block\">\n                                        <h4 class=\"text-capitalize\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression(container.lambda(((stack1 = (depth0 != null ? depth0.title : depth0)) != null ? stack1.rendered : stack1), depth0)) +
            "</a></h4>\n                                        <p class=\"post-time ml-1\">\n                                            <span class=\"time-link mr-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression((helpers.Time || (depth0 && depth0.Time) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.modified : depth0), { "name": "Time", "hash": {}, "data": data })) +
            "</a> </span> /\n                                            <span class=\"comments-link ml-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\"> 0 comments</a></span>\n                                        </p>\n                                        <div class=\"post-preview text-center\">" +
            ((stack1 = container.lambda(((stack1 = (depth0 != null ? depth0.excerpt : depth0)) != null ? stack1.rendered : stack1), depth0)) != null ? stack1 : "") +
            "</div>\n\n                                    </div>\n                                </div>\n <div class=\"category-list my-lg-1 \">\n\n\n\n\n";
    },
    "4": function(container, depth0, helpers, partials, data) {
        var stack1, helper;

        return "                                                                    <div class=\"category-item mh-25 mw-100 mx-1 mb-4 clear-fix\">\n                                        <div class=\"list-img float-left\">\n                                            <img src=\" " +
            container.escapeExpression((helpers.featuredImageHelper || (depth0 && depth0.featuredImageHelper) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.better_featured_image : depth0), { "name": "featuredImageHelper", "hash": {}, "data": data })) +
            " \" alt=\"\">\n                                        </div>\n                                        <div class=\"list-post w-75 float-right pl-2\">\n                                            <span class=\"title d-block text-truncate text-capitalize mb-3\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression(container.lambda(((stack1 = (depth0 != null ? depth0.title : depth0)) != null ? stack1.rendered : stack1), depth0)) +
            "</a></span>\n                                            <span class=\"time-link mr-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression((helpers.Time || (depth0 && depth0.Time) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.modified : depth0), { "name": "Time", "hash": {}, "data": data })) +
            " </a> </span> /\n                                            <span class=\"comments-link ml-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\"> 0 comments</a></span>\n                                        </div>\n                                    </div>\n\n                                ";
    },
    "compiler": [7, ">= 4.0.0"],
    "main": function(container, depth0, helpers, partials, data) {
        var stack1;

        return "<div class=\"post-content clear-fix\">\n" +
            ((stack1 = helpers.each.call(depth0 != null ? depth0 : {}, depth0, { "name": "each", "hash": {}, "fn": container.program(1, data, 0), "inverse": container.noop, "data": data })) != null ? stack1 : "") +
            "                            </div>\n                       </div>\n     </div>\n";
    },
    "useData": true
};










/* {
    "1": function(container, depth0, helpers, partials, data) {
        var stack1;

        return "\n                            \n" +
            ((stack1 = helpers["if"].call(depth0 != null ? depth0 : {}, (data && data.first), { "name": "if", "hash": {}, "fn": container.program(2, data, 0), "inverse": container.program(4, data, 0), "data": data })) != null ? stack1 : "");
    },
    "2": function(container, depth0, helpers, partials, data) {
        var stack1, helper;

        return "                                \n                                <div class=\"category-featured my-1  float-lg-left\">\n                                    <div class=\"post-img mb-3\">\n                                        <img src=\" " +
            container.escapeExpression((helpers.featuredImageHelper || (depth0 && depth0.featuredImageHelper) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.better_featured_image : depth0), { "name": "featuredImageHelper", "hash": {}, "data": data })) +
            " \" alt=\"\" class=\"\">\n                                    </div>\n                                    <div class=\"post-text mw-50 d-block\">\n                                        <h4 class=\"text-capitalize\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression(container.lambda(((stack1 = (depth0 != null ? depth0.title : depth0)) != null ? stack1.rendered : stack1), depth0)) +
            "</a></h4>\n                                        <p class=\"post-time ml-1\">\n                                            <span class=\"time-link mr-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression((helpers.Time || (depth0 && depth0.Time) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.modified : depth0), { "name": "Time", "hash": {}, "data": data })) +
            "</a> </span> /\n                                            <span class=\"comments-link ml-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\"> 0 comments</a></span>\n                                        </p>\n                                        <div class=\"post-preview text-center\">" +
            ((stack1 = container.lambda(((stack1 = (depth0 != null ? depth0.excerpt : depth0)) != null ? stack1.rendered : stack1), depth0)) != null ? stack1 : "") +
            "</div>\n\n                                    </div>\n                                </div>\n";
    },
    "4": function(container, depth0, helpers, partials, data) {
        var stack1, helper;

        return "                                <div class=\"category-list my-lg-1 float-lg-right  flex-column\">\n\n\n\n\n                                    <div class=\"category-item mh-25 mw-100 mx-1 mb-4 clear-fix\">\n                                        <div class=\"list-img float-left\">\n                                            <img src=\" " +
            container.escapeExpression((helpers.featuredImageHelper || (depth0 && depth0.featuredImageHelper) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.better_featured_image : depth0), { "name": "featuredImageHelper", "hash": {}, "data": data })) +
            " \" alt=\"\">\n                                        </div>\n                                        <div class=\"list-post w-75 float-right pl-2\">\n                                            <span class=\"title d-block text-truncate text-capitalize mb-3\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression(container.lambda(((stack1 = (depth0 != null ? depth0.title : depth0)) != null ? stack1.rendered : stack1), depth0)) +
            "</a></span>\n                                            <span class=\"time-link mr-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\">" +
            container.escapeExpression((helpers.Time || (depth0 && depth0.Time) || helpers.helperMissing).call(depth0 != null ? depth0 : {}, (depth0 != null ? depth0.modified : depth0), { "name": "Time", "hash": {}, "data": data })) +
            " </a> </span> /\n                                            <span class=\"comments-link ml-1\"><a href=\"" +
            container.escapeExpression(((helper = (helper = helpers.link || (depth0 != null ? depth0.link : depth0)) != null ? helper : helpers.helperMissing), (typeof helper === "function" ? helper.call(depth0 != null ? depth0 : {}, { "name": "link", "hash": {}, "data": data }) : helper))) +
            "\"> 0 comments</a></span>\n                                        </div>\n                                    </div>\n\n                                </div>\n";
    },
    "compiler": [7, ">= 4.0.0"],
    "main": function(container, depth0, helpers, partials, data) {
        var stack1;

        return "<div class=\"post-content clear-fix\">\n" +
            ((stack1 = helpers.each.call(depth0 != null ? depth0 : {}, depth0, { "name": "each", "hash": {}, "fn": container.program(1, data, 0), "inverse": container.noop, "data": data })) != null ? stack1 : "") +
            "                            </div>\n                            </div>\n";
    },
    "useData": true
}*/