<script src="./transaction.js"></script>

<template>
    <Head title="Transactions" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <CTable small v-if="operations.length">
                            <CTableHead>
                                <CTableRow>
                                    <CTableHeaderCell scope="col">#</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Type</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Description</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Value</CTableHeaderCell>
                                    <CTableHeaderCell style="background-color: #e5e7eb" scope="col">Created</CTableHeaderCell>
                                </CTableRow>
                            </CTableHead>
                            <CTableBody>
                                <CTableRow :key="operation.id" v-for="operation in operations">
                                    <CTableHeaderCell scope="row">{{ operation.id }}</CTableHeaderCell>
                                    <CTableDataCell>{{ getTransactionName(operation.type) }}</CTableDataCell>
                                    <CTableDataCell>{{ operation.description }}</CTableDataCell>
                                    <CTableDataCell>{{ operation.value }}</CTableDataCell>
                                    <CTableDataCell style="background-color: #e5e7eb">{{ getDateTime(operation.created_at) }}</CTableDataCell>
                                </CTableRow>
                            </CTableBody>
                        </CTable>
                        <CAlert class="text-center font-bold" v-else color="danger">Transactions not found</CAlert>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
