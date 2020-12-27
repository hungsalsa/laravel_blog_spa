<template>
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="/alobike">Home</a></li>
            <li class="breadcrumb-item">{{ title }}</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block">
                <span class="js-get-date"></span>
            </li>
        </ol>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>{{ title }}</h2>
                        <span>
                            Hiển thị từ {{ model.from }} đến
                            {{ model.to }} trong {{ model.total }} bản ghi</span
                        >
                        &emsp;&emsp;
                        <div class="form-group per_page_count">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-success">
                                        <i class="ni ni-user fs-xl"></i> Số hiển
                                        thị
                                    </span>
                                </div>
                                <select
                                    class="custom-select"
                                    id="usertype"
                                    aria-label="usertype"
                                    @change="
                                        fetchData();
                                        params.page = 1;
                                    "
                                    v-model="params.per_page"
                                >
                                    <option selected :value="15"> 15 </option>
                                    <option :value="25"> 25 </option>
                                    <option :value="50"> 50 </option>
                                    <option :value="100"> 100 </option>
                                </select>
                            </div>
                        </div>

                        <div class="panel-toolbar">
                            <button
                                type="button"
                                class="btn btn-sm showFilter btn-success waves-effect waves-themed"
                                @click="showFilter = !showFilter"
                            >
                                Tìm kiếm
                            </button>
                            <button
                                class="btn btn-panel"
                                data-action="panel-collapse"
                                data-toggle="tooltip"
                                data-offset="0,10"
                                data-original-title="Collapse"
                            ></button>
                            <button
                                class="btn btn-panel"
                                data-action="panel-fullscreen"
                                data-toggle="tooltip"
                                data-offset="0,10"
                                data-original-title="Fullscreen"
                            ></button>
                            <button
                                class="btn btn-panel"
                                data-action="panel-close"
                                data-toggle="tooltip"
                                data-offset="0,10"
                                data-original-title="Close"
                            ></button>

                            <button
                                class="btn btn-primary btn-sm showStyles"
                                data-toggle="dropdown"
                            >
                                Kiểu hiển thị bảng
                            </button>
                            <div
                                class="dropdown-menu dropdown-menu-animated dropdown-menu-right position-absolute pos-top"
                            >
                                <button
                                    class="dropdown-item active"
                                    data-action="toggle"
                                    data-class="table-bordered"
                                    data-target="#dt-basic-example"
                                >
                                    Bordered Table
                                </button>
                                <button
                                    class="dropdown-item"
                                    data-action="toggle"
                                    data-class="table-sm"
                                    data-target="#dt-basic-example"
                                >
                                    Smaller Table
                                </button>
                                <button
                                    class="dropdown-item"
                                    data-action="toggle"
                                    data-class="table-dark"
                                    data-target="#dt-basic-example"
                                >
                                    Table Dark
                                </button>
                                <button
                                    class="dropdown-item active"
                                    data-action="toggle"
                                    data-class="table-hover"
                                    data-target="#dt-basic-example"
                                >
                                    Table Hover
                                </button>
                                <button
                                    class="dropdown-item active"
                                    data-action="toggle"
                                    data-class="table-stripe"
                                    data-target="#dt-basic-example"
                                >
                                    Table Stripped
                                </button>
                                <div class="dropdown-divider m-0"></div>
                                <div
                                    class="dropdown-multilevel dropdown-multilevel-left"
                                >
                                    <div class="dropdown-item">
                                        tbody color
                                    </div>
                                    <div
                                        class="dropdown-menu no-transition-delay"
                                    >
                                        <div
                                            class="js-tbody-colors dropdown-multilevel dropdown-multilevel-left d-flex flex-wrap"
                                            style="width: 15.9rem; padding: 0.5rem"
                                        >
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-100"
                                                class="btn d-inline-block bg-primary-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-200"
                                                class="btn d-inline-block bg-primary-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-300"
                                                class="btn d-inline-block bg-primary-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-400"
                                                class="btn d-inline-block bg-primary-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-500"
                                                class="btn d-inline-block bg-primary-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-600"
                                                class="btn d-inline-block bg-primary-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-700"
                                                class="btn d-inline-block bg-primary-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-800"
                                                class="btn d-inline-block bg-primary-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-900"
                                                class="btn d-inline-block bg-primary-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-100"
                                                class="btn d-inline-block bg-success-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-200"
                                                class="btn d-inline-block bg-success-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-300"
                                                class="btn d-inline-block bg-success-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-400"
                                                class="btn d-inline-block bg-success-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-500"
                                                class="btn d-inline-block bg-success-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-600"
                                                class="btn d-inline-block bg-success-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-700"
                                                class="btn d-inline-block bg-success-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-800"
                                                class="btn d-inline-block bg-success-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-900"
                                                class="btn d-inline-block bg-success-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-100"
                                                class="btn d-inline-block bg-info-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-200"
                                                class="btn d-inline-block bg-info-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-300"
                                                class="btn d-inline-block bg-info-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-400"
                                                class="btn d-inline-block bg-info-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-500"
                                                class="btn d-inline-block bg-info-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-600"
                                                class="btn d-inline-block bg-info-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-700"
                                                class="btn d-inline-block bg-info-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-800"
                                                class="btn d-inline-block bg-info-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-900"
                                                class="btn d-inline-block bg-info-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-100"
                                                class="btn d-inline-block bg-danger-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-200"
                                                class="btn d-inline-block bg-danger-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-300"
                                                class="btn d-inline-block bg-danger-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-400"
                                                class="btn d-inline-block bg-danger-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-500"
                                                class="btn d-inline-block bg-danger-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-600"
                                                class="btn d-inline-block bg-danger-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-700"
                                                class="btn d-inline-block bg-danger-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-800"
                                                class="btn d-inline-block bg-danger-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-900"
                                                class="btn d-inline-block bg-danger-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-100"
                                                class="btn d-inline-block bg-warning-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-200"
                                                class="btn d-inline-block bg-warning-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-300"
                                                class="btn d-inline-block bg-warning-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-400"
                                                class="btn d-inline-block bg-warning-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-500"
                                                class="btn d-inline-block bg-warning-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-600"
                                                class="btn d-inline-block bg-warning-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-700"
                                                class="btn d-inline-block bg-warning-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-800"
                                                class="btn d-inline-block bg-warning-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-900"
                                                class="btn d-inline-block bg-warning-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-100"
                                                class="btn d-inline-block bg-fusion-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-200"
                                                class="btn d-inline-block bg-fusion-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-300"
                                                class="btn d-inline-block bg-fusion-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-400"
                                                class="btn d-inline-block bg-fusion-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-500"
                                                class="btn d-inline-block bg-fusion-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-600"
                                                class="btn d-inline-block bg-fusion-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-700"
                                                class="btn d-inline-block bg-fusion-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-800"
                                                class="btn d-inline-block bg-fusion-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-900"
                                                class="btn d-inline-block bg-fusion-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg=""
                                                class="btn d-inline-block bg-white border width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="dropdown-multilevel dropdown-multilevel-left"
                                >
                                    <div class="dropdown-item">
                                        thead color
                                    </div>
                                    <div
                                        class="dropdown-menu no-transition-delay"
                                    >
                                        <div
                                            class="js-thead-colors dropdown-multilevel dropdown-multilevel-left d-flex flex-wrap"
                                            style="width: 15.9rem; padding: 0.5rem"
                                        >
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-100"
                                                class="btn d-inline-block bg-primary-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-200"
                                                class="btn d-inline-block bg-primary-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-300"
                                                class="btn d-inline-block bg-primary-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-400"
                                                class="btn d-inline-block bg-primary-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-500"
                                                class="btn d-inline-block bg-primary-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-600"
                                                class="btn d-inline-block bg-primary-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-700"
                                                class="btn d-inline-block bg-primary-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-800"
                                                class="btn d-inline-block bg-primary-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-primary-900"
                                                class="btn d-inline-block bg-primary-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-100"
                                                class="btn d-inline-block bg-success-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-200"
                                                class="btn d-inline-block bg-success-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-300"
                                                class="btn d-inline-block bg-success-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-400"
                                                class="btn d-inline-block bg-success-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-500"
                                                class="btn d-inline-block bg-success-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-600"
                                                class="btn d-inline-block bg-success-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-700"
                                                class="btn d-inline-block bg-success-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-800"
                                                class="btn d-inline-block bg-success-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-success-900"
                                                class="btn d-inline-block bg-success-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-100"
                                                class="btn d-inline-block bg-info-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-200"
                                                class="btn d-inline-block bg-info-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-300"
                                                class="btn d-inline-block bg-info-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-400"
                                                class="btn d-inline-block bg-info-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-500"
                                                class="btn d-inline-block bg-info-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-600"
                                                class="btn d-inline-block bg-info-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-700"
                                                class="btn d-inline-block bg-info-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-800"
                                                class="btn d-inline-block bg-info-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-info-900"
                                                class="btn d-inline-block bg-info-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-100"
                                                class="btn d-inline-block bg-danger-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-200"
                                                class="btn d-inline-block bg-danger-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-300"
                                                class="btn d-inline-block bg-danger-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-400"
                                                class="btn d-inline-block bg-danger-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-500"
                                                class="btn d-inline-block bg-danger-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-600"
                                                class="btn d-inline-block bg-danger-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-700"
                                                class="btn d-inline-block bg-danger-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-800"
                                                class="btn d-inline-block bg-danger-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-danger-900"
                                                class="btn d-inline-block bg-danger-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-100"
                                                class="btn d-inline-block bg-warning-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-200"
                                                class="btn d-inline-block bg-warning-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-300"
                                                class="btn d-inline-block bg-warning-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-400"
                                                class="btn d-inline-block bg-warning-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-500"
                                                class="btn d-inline-block bg-warning-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-600"
                                                class="btn d-inline-block bg-warning-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-700"
                                                class="btn d-inline-block bg-warning-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-800"
                                                class="btn d-inline-block bg-warning-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-warning-900"
                                                class="btn d-inline-block bg-warning-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-100"
                                                class="btn d-inline-block bg-fusion-100 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-200"
                                                class="btn d-inline-block bg-fusion-200 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-300"
                                                class="btn d-inline-block bg-fusion-300 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-400"
                                                class="btn d-inline-block bg-fusion-400 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-500"
                                                class="btn d-inline-block bg-fusion-500 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-600"
                                                class="btn d-inline-block bg-fusion-600 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-700"
                                                class="btn d-inline-block bg-fusion-700 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-800"
                                                class="btn d-inline-block bg-fusion-800 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg="bg-fusion-900"
                                                class="btn d-inline-block bg-fusion-900 width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                            <a
                                                href="javascript:void(0);"
                                                data-bg=""
                                                class="btn d-inline-block bg-white border width-2 height-2 p-0 rounded-0"
                                                style="margin:1px"
                                            ></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <!-- datatable start -->
                            <table
                                id="dt-basic-example"
                                class="table table-bordered table-hover table-striped w-100"
                            >
                                <thead class="bg-highlight">
                                    <tr role="row">
                                        <th
                                            :class="{
                                                sorting: thead.sort
                                            }"
                                            v-for="thead in theads"
                                        >
                                            <template v-if="thead.sort">
                                                <span @click="sort(thead.key)">
                                                    {{ thead.title }}
                                                    <template
                                                        v-if="
                                                            params.sort_column ===
                                                                thead.key
                                                        "
                                                    >
                                                        <i
                                                            v-if="
                                                                params.direction ===
                                                                    'asc'
                                                            "
                                                            class="fal fa-long-arrow-up"
                                                            aria-hidden="true"
                                                        ></i>
                                                        <i
                                                            v-else
                                                            class="fal fa-long-arrow-down"
                                                            aria-hidden="true"
                                                        ></i>
                                                    </template>
                                                </span>
                                            </template>
                                            <template v-else>
                                                <span> {{ thead.title }} </span>
                                            </template>
                                        </th>
                                    </tr>
                                    <tr role="row" v-if="showFilter">
                                        <th rowspan="1" colspan="1">
                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="single-default"
                                                >
                                                    Giá trị lọc
                                                </label>
                                                <select
                                                    v-model="
                                                        params.search_column
                                                    "
                                                    class="select2 form-control w-100"
                                                    id="single-default"
                                                >
                                                    <option
                                                        v-for="(column,
                                                        key) in filters"
                                                        :value="key"
                                                    >
                                                        {{ column }}
                                                    </option>
                                                </select>
                                            </div>
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <div class="form-group">
                                                <label
                                                    class="form-label"
                                                    for="single-default"
                                                >
                                                    Kiểu lọc
                                                </label>
                                                <select
                                                    v-model="
                                                        params.search_operator
                                                    "
                                                    class="select2 form-control w-100"
                                                    id="single-default"
                                                >
                                                    <option
                                                        v-for="(column,
                                                        key) in operators"
                                                        :value="key"
                                                    >
                                                        {{ column }}
                                                    </option>
                                                </select>
                                            </div>
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <input
                                                type="text"
                                                @keyup.enter="fetchData"
                                                v-model="params.search_query_1"
                                                @blur="fetchData"
                                                class="form-control form-control-sm"
                                                placeholder="Search key 1"
                                            />
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <input
                                                v-if="
                                                    params.search_operator ===
                                                        'between'
                                                "
                                                v-model="params.search_query_2"
                                                type="text"
                                                class="form-control form-control-sm"
                                                placeholder="Search key 2"
                                            />
                                        </th>
                                        <th rowspan="1" colspan="1">
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-success waves-effect waves-themed"
                                                @click.prevent="fetchData"
                                            >
                                                Lọc
                                            </button>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="isLoading" class="demo">
                                        <td colspan="5" class="text-center">
                                            <div
                                                class="spinner-grow text-primary"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-secondary"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-success"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-danger"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-warning"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-info"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-light"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                            <div
                                                class="spinner-grow text-dark"
                                                role="status"
                                            >
                                                <span class="sr-only"
                                                    >Loading...</span
                                                >
                                            </div>
                                        </td>
                                    </tr>

                                    <tr v-else-if="model.total <= 0">
                                        <td colspan="5" class="text-danger">
                                            Không có dữ liệu
                                        </td>
                                    </tr>
                                    <slot v-else :items="model.data"></slot>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="5">
                                            <nav
                                                aria-label="Page navigation example"
                                            >
                                                <ul
                                                    class="pagination justify-content-end"
                                                >
                                                    <li
                                                        class="page-item"
                                                        :class="{
                                                            disabled:
                                                                null ==
                                                                model.prev_page_url
                                                        }"
                                                    >
                                                        <a
                                                            class="page-link"
                                                            href="javascript:void(0)"
                                                            @click="prev"
                                                            aria-label="Previous"
                                                        >
                                                            <span
                                                                aria-hidden="true"
                                                                ><i
                                                                    class="fal fa-hand-point-left"
                                                                ></i
                                                            ></span>
                                                        </a>
                                                    </li>

                                                    <li
                                                        v-for="i in paginageWithDots"
                                                        :key="i"
                                                        @click="changePage(i)"
                                                        class="page-item"
                                                        :class="{
                                                            active:
                                                                i ==
                                                                model.current_page
                                                        }"
                                                    >
                                                        <a
                                                            class="page-link"
                                                            href="javascript:void(0)"
                                                            >{{ i }}</a
                                                        >
                                                    </li>

                                                    <li
                                                        class="page-item"
                                                        :class="{
                                                            disabled:
                                                                null ==
                                                                model.next_page_url
                                                        }"
                                                    >
                                                        <a
                                                            class="page-link"
                                                            href="javascript:void(0)"
                                                            @click="next"
                                                            aria-label="Next"
                                                        >
                                                            <span
                                                                aria-hidden="true"
                                                                ><i
                                                                    class="fal fa-hand-point-right"
                                                                ></i
                                                            ></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <!-- datatable end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
export default {
    props: ["title", "theads", "filters", "source"],
    data() {
        return {
            showFilter: false,
            isLoading: true,
            isError: false,
            // source: "",
            operators: {
                equal_to: "=",
                less_than: "<",
                greater_than: ">",
                like: "LIKE",
                in: "IN",
                not_in: "NOT_IN",
                between: "BETWEEN"
            },
            model: {
                data: []
            },
            params: {
                page: 1,
                per_page: 25,
                sort_column: "cateName",
                direction: "asc",
                search_column: "cateName",
                search_operator: "like",
                search_query_1: "",
                search_query_2: ""
            },
            paginageWithDots: []
        };
    },
    created() {
        this.fetchData();
    },
    watch: {},
    computed: {},
    methods: {
        fetchData() {
            this.isLoading = true;
            axios
                .get(this.buildUrl(), { params: this.params })
                .then(response => {
                    this.model = response.data;
                    console.log(this.model);
                    if (this.model.total > 0) {
                        this.paginageWithDots = this.pagination(
                            this.model.current_page,
                            this.model.last_page
                        );
                    }
                    this.isLoading = false;
                    // console.log(response);
                    // console.log(response.data.status);
                    // console.log(this.model.total);
                    // console.log(this.model);
                    // console.log(this.paginageWithDots);
                })
                .catch(error => {
                    this.isLoading = true;
                    console.log(error);
                });
        },
        buildUrl() {
            let p = this.params;
            return `${this.source}?page=${p.page}&per_page=${p.per_page}&sort_column=${p.sort_column}&direction=${p.direction}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`;
        },

        prev() {
            if (this.model.prev_page_url) {
                this.params.page--;
                this.fetchData();
            }
        },
        next() {
            if (this.model.next_page_url) {
                this.params.page++;
                this.fetchData();
            }
        },
        changePage(page) {
            if (page === "...") {
                return false;
            }
            this.params.page = page;
            this.fetchData();
        },
        sort(column) {
            this.params.sort_column = column;
            if (this.params.direction === "asc") {
                this.params.direction = "desc";
            } else {
                this.params.direction = "asc";
            }
            this.fetchData();
            console.log(column);
        },
        pagination(c, m) {
            //c: current_page | m : total_pages
            let delta = 2,
                range = [],
                rangeWithDots = [],
                l;

            range.push(1);
            for (let i = c - delta; i <= c + delta; i++) {
                if (i < m && i > 1) {
                    range.push(i);
                }
            }
            if (m != 1) range.push(m);
            range.map(val => {
                if (l) {
                    if (val - l === 2) {
                        rangeWithDots.push(l + 1);
                    } else if (val - l !== 1) {
                        rangeWithDots.push("...");
                    }
                }
                rangeWithDots.push(val);
                l = val;
            });
            return rangeWithDots;
        }
    }
};
</script>

<style scoped>
.per_page_count {
    margin-bottom: unset;
    width: auto;
    /* float: right; */
}
.btn.btn-sm.showFilter {
    margin: 0 20px;
}
.btn.showStyles {
    margin-left: 10px;
}
.table thead .sorting span {
    display: inline-block;
    width: 100%;
}
.table thead .sorting {
    cursor: pointer;
}
</style>
