! function(o) { "use strict"; var e = function() { this.$body = o("body") };
    e.prototype.createLineChart = function(e, t, a, o) { var r = { fontName: "Poppins", height: 340, curveType: "function", fontSize: 14, chartArea: { left: "5%", width: "90%", height: 300 }, backgroundColor: { fill: "transparent" }, hAxis: { textStyle: { color: "#9ea4ba" } }, pointSize: 4, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, vAxis: { title: a, titleTextStyle: { fontSize: 14, italic: !1, color: "#9ea4ba" }, gridlines: { color: "transparent", count: 10 }, baselineColor: "#9ea4ba", textStyle: { color: "#9ea4ba" }, minValue: 0 }, legend: { position: "top", alignment: "center", textStyle: { fontSize: 14, color: "#9ea4ba" } }, lineWidth: 3, colors: o },
            i = google.visualization.arrayToDataTable(t),
            n = new google.visualization.LineChart(e); return n.draw(i, r), n }, e.prototype.createAreaChart = function(e, t, a, o) { var r = { fontName: "Poppins", height: 340, curveType: "function", fontSize: 14, chartArea: { left: "5%", width: "90%", height: 300 }, backgroundColor: { fill: "transparent" }, hAxis: { textStyle: { color: "#9ea4ba" } }, pointSize: 4, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, vAxis: { title: a, titleTextStyle: { fontSize: 14, italic: !1, color: "#9ea4ba" }, gridarea: { color: "#f5f5f5", count: 10 }, gridlines: { color: "transparent" }, baselineColor: "#9ea4ba", textStyle: { color: "#9ea4ba" }, minValue: 0 }, legend: { position: "top", alignment: "end", textStyle: { fontSize: 14, color: "#9ea4ba" } }, lineWidth: 2, colors: o },
            i = google.visualization.arrayToDataTable(t),
            n = new google.visualization.AreaChart(e); return n.draw(i, r), n }, e.prototype.createColumnChart = function(e, t, a, o) { var r = { fontName: "Poppins", height: 400, backgroundColor: { fill: "transparent" }, fontSize: 13, chartArea: { left: "5%", width: "90%", height: 350 }, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, hAxis: { textStyle: { color: "#9ea4ba" } }, vAxis: { title: a, titleTextStyle: { fontSize: 14, italic: !1, color: "#9ea4ba" }, gridlines: { color: "transparent", count: 10 }, baselineColor: "#9ea4ba", minValue: 0 }, legend: { position: "top", alignment: "center", textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: o },
            i = google.visualization.arrayToDataTable(t),
            n = new google.visualization.ColumnChart(e); return n.draw(i, r), n }, e.prototype.createBarChart = function(e, t, a) { var o = { fontName: "Poppins", height: 400, backgroundColor: { fill: "transparent" }, fontSize: 14, chartArea: { left: "5%", width: "90%", height: 350 }, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, hAxis: { textStyle: { color: "#9ea4ba" }, baselineColor: "#9ea4ba", gridlines: { color: "transparent", count: 10 } }, vAxis: { textStyle: { color: "#9ea4ba" }, minValue: 0 }, legend: { position: "top", alignment: "center", textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: a },
            r = google.visualization.arrayToDataTable(t),
            i = new google.visualization.BarChart(e); return i.draw(r, o), i }, e.prototype.createColumnStackChart = function(e, t, a, o) { var r = { fontName: "Poppins", height: 400, backgroundColor: { fill: "transparent" }, fontSize: 13, chartArea: { left: "5%", width: "90%", height: 350 }, isStacked: !0, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, hAxis: { textStyle: { color: "#9ea4ba" } }, vAxis: { title: a, textStyle: { color: "#9ea4ba" }, titleTextStyle: { fontSize: 14, italic: !1, color: "#9ea4ba" }, gridlines: { color: "transparent", count: 10 }, baselineColor: "#9ea4ba", minValue: 0 }, legend: { position: "top", alignment: "center", textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: o },
            i = google.visualization.arrayToDataTable(t),
            n = new google.visualization.ColumnChart(e); return n.draw(i, r), n }, e.prototype.createBarStackChart = function(e, t, a) { var o = { fontName: "Poppins", height: 400, backgroundColor: { fill: "transparent" }, fontSize: 13, chartArea: { left: "5%", width: "90%", height: 350 }, isStacked: !0, tooltip: { textStyle: { fontName: "Poppins", fontSize: 14 } }, hAxis: { textStyle: { color: "#9ea4ba" }, baselineColor: "#9ea4ba", gridlines: { color: "transparent", count: 10 }, minValue: 0 }, vAxis: { textStyle: { color: "#9ea4ba" } }, legend: { position: "top", alignment: "center", textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: a },
            r = google.visualization.arrayToDataTable(t),
            i = new google.visualization.BarChart(e); return i.draw(r, o), i }, e.prototype.createPieChart = function(e, t, a, o, r) { var i = { fontName: "Poppins", fontSize: 13, height: 300, width: 500, backgroundColor: { fill: "transparent" }, chartArea: { left: 50, width: "90%", height: "90%" }, legend: { textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: a };
        o && (i.is3D = !0), r && (i.is3D = !0, i.pieSliceText = "label", i.slices = { 2: { offset: .15 }, 5: { offset: .1 } }); var n = google.visualization.arrayToDataTable(t),
            l = new google.visualization.PieChart(e); return l.draw(n, i), l }, e.prototype.createDonutChart = function(e, t, a) { var o = { fontName: "Poppins", fontSize: 13, height: 300, backgroundColor: { fill: "transparent" }, pieHole: .55, width: 500, chartArea: { left: 50, width: "90%", height: "90%" }, legend: { textStyle: { fontSize: 13, color: "#9ea4ba" } }, colors: a },
            r = google.visualization.arrayToDataTable(t),
            i = new google.visualization.PieChart(e); return i.draw(r, o), i }, e.prototype.init = function() { var e = this,
            t = [
                ["Year", "Sales", "Expenses"],
                ["2010", 850, 120],
                ["2011", 745, 200],
                ["2012", 852, 180],
                ["2013", 1e3, 400],
                ["2014", 1170, 460],
                ["2015", 660, 1120],
                ["2016", 1030, 540]
            ];
        e.createLineChart(o("#line-chart")[0], t, "Sales and Expenses", ["#348cd4", "#45bbe0"]), e.createAreaChart(o("#area-chart")[0], t, "Sales and Expenses", ["#348cd4", "#45bbe0"]);
        e.createColumnChart(o("#column-chart")[0], [
            ["Year", "Desktop", "Tablets", "Mobiles"],
            ["2010", 850, 120, 200],
            ["2011", 745, 200, 562],
            ["2012", 852, 180, 521],
            ["2013", 1e3, 400, 652],
            ["2014", 1170, 460, 200],
            ["2015", 660, 1120, 562],
            ["2016", 1030, 540, 852]
        ], "Sales and Expenses", ["#348cd4", "#45bbe0", "#8892d6"]);
        e.createBarChart(o("#bar-chart")[0], [
            ["Year", "Sales", "Expenses"],
            ["2004", 1e3, 400],
            ["2005", 1170, 460],
            ["2006", 660, 1120],
            ["2007", 1030, 540]
        ], ["#348cd4", "#45bbe0"]);
        e.createColumnStackChart(o("#column-stacked-chart")[0], [
            ["Genre", "Fantasy & Sci Fi", "Romance", "Mystery/Crime", "General", { role: "annotation" }],
            ["2000", 20, 30, 35, 40, ""],
            ["2005", 14, 20, 25, 30, ""],
            ["2010", 10, 24, 20, 32, ""],
            ["2015", 15, 25, 30, 35, ""],
            ["2020", 16, 22, 23, 30, ""],
            ["2025", 12, 26, 20, 40, ""],
            ["2030", 28, 19, 29, 30, ""]
        ], "Sales and Expenses", ["#1ea69a", "#348cd4", "#45bbe0", "#8892d6"]);
        e.createBarStackChart(o("#bar-stacked-chart")[0], [
            ["Genre", "Fantasy & Sci Fi", "Romance", "Mystery/Crime", "General", { role: "annotation" }],
            ["2000", 20, 30, 35, 40, ""],
            ["2005", 14, 20, 25, 30, ""],
            ["2010", 10, 24, 20, 32, ""],
            ["2015", 15, 25, 30, 35, ""],
            ["2020", 16, 22, 23, 30, ""],
            ["2025", 12, 26, 20, 40, ""],
            ["2030", 28, 19, 29, 30, ""]
        ], ["#1ea69a", "#348cd4", "#45bbe0", "#8892d6"]); var a = [
            ["Task", "Hours per Day"],
            ["Work", 11],
            ["Eat", 2],
            ["Commute", 2],
            ["Watch TV", 2],
            ["Sleep", 7]
        ];
        e.createPieChart(o("#pie-chart")[0], a, ["#188ae2", "#4bd396", "#f9c851", "#f5707a", "#6b5fb5"], !1, !1), e.createDonutChart(o("#donut-chart")[0], a, ["#188ae2", "#4bd396", "#f9c851", "#f5707a", "#6b5fb5"]), e.createPieChart(o("#pie-3d-chart")[0], a, ["#188ae2", "#4bd396", "#f9c851", "#f5707a", "#6b5fb5"], !0, !1);
        e.createPieChart(o("#3d-exploded-chart")[0], [
            ["Language", "Speakers (in millions)"],
            ["Assamese", 13],
            ["Bengali", 83],
            ["Gujarati", 46],
            ["Hindi", 90],
            ["Kannada", 38],
            ["Malayalam", 33]
        ], ["#188ae2", "#4bd396", "#f9c851", "#f5707a", "#6b5fb5"], !0, !0) }, o.GoogleChart = new e, o.GoogleChart.Constructor = e }(window.jQuery),
function(e) { "use strict";
    google.load("visualization", "1", { packages: ["corechart"] }), google.setOnLoadCallback(function() { e.GoogleChart.init() }) }(window.jQuery);