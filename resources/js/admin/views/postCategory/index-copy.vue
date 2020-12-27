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
                                    @change="fetchData"
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
                                            class="sorting"
                                            aria-label="Position: activate to sort column descending"
                                            aria-sort="ascending"
                                            v-for="thead in theads"
                                        >
                                            <div
                                                v-if="thead.sort"
                                                @click="sort(thead.key)"
                                            >
                                                <span>{{ thead.title }}</span>
                                            </div>
                                            <div v-else>
                                                <span>{{ thead.title }}</span>
                                            </div>
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
                                    <tr v-for="(item, index) in model.data">
                                        <td class="text-center">
                                            {{ index + 1 }}
                                        </td>
                                        <td>{{ item.cateName }}</td>
                                        <!-- <td>{{ item.image }}</td> -->
                                        <td>
                                            {{ format_date(item.created_at) }}
                                        </td>
                                        <td v-if="item.user_cre !== null">
                                            {{ item.user_cre.name }}
                                        </td>
                                        <td v-else>----</td>

                                        <td>Sửa / Xóa</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- datatable end -->

                            <div
                                class="panel-content py-2 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted d-flex"
                            >
                                <div class="col-lg-3">
                                    <nav aria-label="Page navigation example">
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
                                                    <span aria-hidden="true"
                                                        ><i
                                                            class="fal fa-hand-point-left"
                                                        ></i
                                                    ></span>
                                                </a>
                                            </li>

                                            <li
                                                v-for="i in model.last_page"
                                                @click="setPage(i)"
                                                class="page-item"
                                                :class="{
                                                    active:
                                                        i == model.current_page
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
                                                    <span aria-hidden="true"
                                                        ><i
                                                            class="fal fa-hand-point-right"
                                                        ></i
                                                    ></span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import moment from "moment";
export default {
    data() {
        return {
            title: "Danh mục tin tức",
            showFilter: false,
            theads: [
                { title: "STT", key: "id", sort: false },
                { title: "Tên", key: "cateName", sort: true },
                { title: "Ngày tạo", key: "created_at", sort: true },
                { title: "Người tạo", key: "userCreated", sort: true },
                { title: "Action", key: "action", sort: false }
            ],
            filters: {
                id: "id",
                cateName: "Tên danh mục",
                userCreated: "Người sửa",
                parent_id: "Danh mục cha",
                userCreated: "Người tạo"
            },
            // filters: ["id", "cateName", "image", "slug"],
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
                per_page: 15,
                sort_column: "created_at",
                direction: "desc",
                search_column: "id",
                search_operator: "equal_to",
                search_query_1: "",
                search_query_2: ""
            }
            // totalPages : 0
        };
    },
    created() {
        this.fetchData();
    },
    watch: {},
    computed: {},
    methods: {
        fetchData() {
            axios
                .get(this.buildUrl(), { params: this.params })
                .then(response => {
                    this.model = response.data;
                    // console.log(response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },
        buildUrl() {
            let p = this.params;
            return `/api/post-category?page=${p.page}&per_page=${p.per_page}&sort_column=${p.sort_column}&direction=${p.direction}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`;
        },
        // format_date(value) {
        //     if (value) {
        //         return moment(String(value)).format("DD-MM-YYYY");
        //     }
        // },
        format_date: function(date) {
            return moment(date, "YYYY-MM-DD").format("h:mm:ss A DD/MM/YYYY");
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
        setPage(i) {
            this.params.page = i;
            this.fetchData();
        },
        sort(column) {
            console.log(column);
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
</style>
