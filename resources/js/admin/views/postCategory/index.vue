<template>
    <data-table
        :title="title"
        :theads="theads"
        :filters="filters"
        :source="source"
    >
        <template slot-scope="props">
            <tr v-for="(item, record) in props.items" :key="record">
                <td>{{ record + 1 }}</td>
                <td>{{ item.cateName }}</td>
                <td>
                    {{ format_date(item.created_at) }}
                </td>
                <td v-if="item.user_cre !== null">
                    {{ item.user_cre.name }}
                </td>
                <td v-else>----</td>
                <td>Sửa / Xóa</td>
            </tr>
        </template>
    </data-table>
</template>
<script>
import moment from "moment";
import DataTable from "../../components/DataTables.vue";
export default {
    // props: ["items"],
    data() {
        return {
            title: "Danh mục tin tức",
            source: "/api/post-category",
            // isLoading: true,
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
            }
        };
    },
    created() {
        this.headd();
    },
    methods: {
        format_date: function(date) {
            return moment(date, "YYYY-MM-DD").format("h:mm A DD/MM/YYYY");
        },
        headd() {
            console.log(this.theads[0].key);
        }
    },
    components: {
        DataTable
    }
};
</script>
