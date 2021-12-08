@extends('base_exam')
@section('content')

    <style>


    </style>

    <div class="px-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm">
                    <a class="opacity-3 text-dark" href="/profil">
                        <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>shop </title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                    <g transform="translate(1716.000000, 291.000000)">
                                        <g transform="translate(0.000000, 148.000000)">
                                            <path
                                                d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z">
                                            </path>
                                            <path
                                                d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z">
                                            </path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </a>
                </li>
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Penilaian</a>
                </li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Soalan Kemahiran</li>
            </ol>
            <h6 class="font-weight-bolder">Pemprosesan Perkataan</h6>
        </nav>

        <div class="container-fluid pb-3">

            <div class="card mt-5 bg-secondary">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <div class="card-body bg-secondary" style="border-radius: 15px; max-width:800px">
                            <form action="/soalan-kemahiran-word" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <input type="hidden" name="id_soalankemahiranword" value="{{ $soalankemahiranwords->id }}" id="penilaian">
                                        <div class="form-group">
                                            <label class="form-control-label text-white" for="editor">Jawapan</label>
                                            <textarea id="editor" class="form-control" name="jawapan_word">
                                                        <p>
                                                            Overview of Microsoft Office Word 2007
                                                        </p>
                                                        <p>
                                                            Welcome to Microsoft® Office Word 2007, included in the 2007 release of the Microsoft Office system. Word 2007 is a powerful authoring program that gives you the ability to create and share professional-looking documents by combining a comprehensive set of writing tools with an easy to-use interface.
                                                        </p>
                                                        <p>
                                                            Office Word 2007 helps information workers create professional-looking content more quickly than ever before. With a host of new tools, you can quickly construct documents from predefined parts and styles, as well as as compose and publish blogs directly from within Word. Advanced integration with Microsoft Office SharePoint® Server 2007 and a new XML-based file format make Office Word 2007 the ideal choice for building integrated document management solutions.
                                                        </p>
                                                        <p>
                                                            This document provides an overview of Office Word 2007, with an emphasis on new and improved features. It also covers Office Word 2007 in action to demonstrate its exciting new capabilities.
                                                        </p>
                                                        <p>
                                                            Create Professional-Looking Content
                                                        </p>
                                                        <p>
                                                            Together with the Microsoft Office Fluent™ interface, Office Word 2007 gives you the tools you need to create professional-looking content.
                                                        </p>
                                                                        {{-- <p>
                                                    A		The Office Fluent user interface presents the right tools to you when you need them
                                                </p>
                                                <p>
                                                    B		Add Building Blocks of predefined content and reduce the errors associated with copying and pasting frequently used content.
                                                </p>
                                                <p>
                                                    C		Quick Styles save you time by quickly formatting text and tables throughout your document.
                                                </p>
                                                <p>
                                                    D		Document Themes apply the same tubers, fonts, and effects to your documents for a consistent look.
                                                </p>
                                                <p>
                                                    E		SmartArt™ diagrams and a new charting engine help you add a professional look to documents. Shared diagramming and charting with Microsoft Office Excel® 2007 spreadsheet software and the Microsoft Office PowerPoint® 2007 presentation graphics program help ensure a consistent look across your documents, spreadsheets, and presentations.
                                                </p>
                                                <p>
                                                    F		The Equation Builder helps you construct editable, in-line mathematical equations using real mathematical symbols, prebuilt equations, and automatic formatting
                                                </p> --}}
                                                    </textarea>
                                        </div>
                                    </div>
                                    {{-- <div class="col-12" style="text-align: end;">
                                        <button class="btn btn-success" type="submit">Hantar</button>
                                    </div> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')

    {{-- <script src="https://cdn.ckeditor.com/4.16.2/full-all/ckeditor.js"></script> --}}
    <script src="/assets/ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('editor', {
            language: 'en',
            height: '800px',
            width: 'auto',
            extraPlugins: 'save'
        });
    </script>
@stop
