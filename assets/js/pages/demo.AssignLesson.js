$(document).ready(function() {
  "use strict";
  
  var chartOptions = {
    chart: {
      type: "line",
      width: 80,
      height: 35,
      sparkline: {
        enabled: true
      }
    },
    series: [],
    stroke: {
      width: 2,
      curve: "smooth"
    },
    markers: {
      size: 0
    },
    colors: ["#727cf5"],
    tooltip: {
      fixed: {
        enabled: false
      },
      x: {
        show: false
      },
      y: {
        title: {
          formatter: function(e) {
            return "";
          }
        }
      },
      marker: {
        show: false
      }
    }
  };
  
  var sparklineCharts = [];
  
  $("#products-datatable").DataTable({
    language: {
      paginate: {
        previous: "<i class='mdi mdi-chevron-left'>",
        next: "<i class='mdi mdi-chevron-right'>"
      },
      info: "Showing Students _START_ to _END_ of _TOTAL_",
      lengthMenu: 'Display <select class=\'form-select form-select-sm ms-1 me-1\'><option value="10">10</option><option value="20">20</option><option value="-1">All</option></select> Students'
    },
    pageLength: 10,
    columns: [
      {
        orderable: false,
        render: function(e, a, l, t) {
          if (a === "display") {
            e = '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>';
          }
          return e;
        },
        checkboxes: {
          selectRow: true,
          selectAllRender: '<div class="form-check"><input type="checkbox" class="form-check-input dt-checkboxes"><label class="form-check-label">&nbsp;</label></div>'
        }
      },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: true },
      { orderable: false },
      { orderable: false },
      { orderable: false },
      { orderable: false }
    ],
    select: {
      style: "multi"
    },
    order: [[4, "desc"]],
    drawCallback: function() {
      $(".dataTables_paginate > .pagination").addClass("pagination-rounded");
      $("#products-datatable_length label").addClass("form-label");
      
      for (var e = 0; e < sparklineCharts.length; e++) {
        try {
          sparklineCharts[e].destroy();
        } catch(e) {
          console.log(e);
        }
      }
      sparklineCharts = [];
      
      $(".spark-chart").each(function(e) {
        var chartData = $(this).data().dataset;
        chartOptions.series = [{ data: chartData }];
        var sparklineChart = new ApexCharts($(this)[0], chartOptions);
        sparklineCharts.push(sparklineChart);
        sparklineChart.render();
      });
    }
  });
});
