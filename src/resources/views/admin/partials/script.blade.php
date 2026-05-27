<!--begin::Script-->

<!-- 1. OverlayScrollbars -->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous"></script>

<!-- 2. Bootstrap Bundle (inclui Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<!-- 3. AdminLTE -->
<script src="{{ asset('dash/js/adminlte.js') }}"></script>

<!-- 4. OverlayScrollbars Configure -->
<script>
  const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
  const Default = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'leave',
    scrollbarClickScroll: true,
  };
  document.addEventListener('DOMContentLoaded', function() {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    const isMobile = window.innerWidth <= 992;
    if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined && !isMobile) {
      OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
        scrollbars: {
          theme: Default.scrollbarTheme,
          autoHide: Default.scrollbarAutoHide,
          clickScroll: Default.scrollbarClickScroll,
        },
      });
    }
  });
</script>

<!-- sortablejs -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous"></script>
<script>
  const sortableEl = document.querySelector('.connectedSortable');
  if (sortableEl) {
    new Sortable(sortableEl, { group: 'shared', handle: '.card-header' });
    document.querySelectorAll('.connectedSortable .card-header').forEach((el) => {
      el.style.cursor = 'move';
    });
  }
</script>

<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" crossorigin="anonymous"></script>
<script>
  const revenueChart = document.querySelector('#revenue-chart');
  if (revenueChart) {
    const sales_chart = new ApexCharts(revenueChart, {
      series: [
        { name: 'Digital Goods', data: [28, 48, 40, 19, 86, 27, 90] },
        { name: 'Electronics', data: [65, 59, 80, 81, 56, 55, 100] },
      ],
      chart: { height: 300, type: 'area', toolbar: { show: false } },
      legend: { show: false },
      colors: ['#da1212ff', '#17d831ff'],
      dataLabels: { enabled: false },
      stroke: { curve: 'smooth' },
      xaxis: {
        type: 'datetime',
        categories: ['2023-01-01','2023-02-01','2023-03-01','2023-04-01','2023-05-01','2023-06-01','2023-07-01'],
      },
      tooltip: { x: { format: 'MMMM yyyy' } },
    });
    sales_chart.render();
  }
</script>

<!-- jsvectormap -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" crossorigin="anonymous"></script>