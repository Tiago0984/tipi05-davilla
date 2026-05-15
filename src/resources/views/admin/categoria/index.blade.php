<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Simple Tables</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Simple Tables" />
    <meta name="author" content="ColorlibHQ" />
    <meta
        name="description"
        content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
    <meta
        name="keywords"
        content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('dash/css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
        crossorigin="anonymous"
        media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('dash/css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->

<div class="card mb-4" style="width: 50%;">
    <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table class="table table-bordered" role="table">
            <thead>
                <tr>
                    <th style="width: 10px" scope="col">Cod.</th>
                    <th scope="col">Nome da Categoria</th>
                    <th scope="col" style="text-align: center;">Descrição da categoria</th>
                    <th style="width: 40px; text-align: center" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $linha)
                <tr class="align-middle">
                    <td>{{ $linha->id_categoria }}</td>
                    <td>{{ $linha->nome_categoria }}</td>
                    <td>
                        <div>
                            <div>{{ $linha->descricao_categoria }}</div>
                        </div>
                    </td>
                    @if ($linha->status_categoria == 'ATIVO')
                        <td><span class="badge text-bg-success">Disponível</span></td>
                    @else
                        <td><span class="badge text-bg-danger">Indisponível</span></td>
                    @endif
                </tr>
                @endforeach
                <!-- <tr class="align-middle">
                          <td>2.</td>
                          <td>Clean database</td>
                          <td>
                            <div class="progress progress-xs">
                              <div class="progress-bar text-bg-warning" style="width: 70%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-warning">70%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>3.</td>
                          <td>Cron job running</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-primary" style="width: 30%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-primary">30%</span>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td>4.</td>
                          <td>Fix and squish bugs</td>
                          <td>
                            <div class="progress progress-xs progress-striped active">
                              <div class="progress-bar text-bg-success" style="width: 90%"></div>
                            </div>
                          </td>
                          <td>
                            <span class="badge text-bg-success">90%</span>
                          </td>
                        </tr> -->
            </tbody>
        </table>


    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-end">
            <li class="page-item">
                <a class="page-link" href="#">«</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#">»</a>
            </li>
        </ul>
    </div>
</div>