<script src="./main.js"></script>

<template>
    <Head title="Main" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="d-flex justify-content-end">
                            <CAlert color="success">Your balance: <b>{{ balance }} $</b></CAlert>
                        </div>

                        <hr>

                        <br>

                        <CTable v-if="operations.length" small>
                            <CTableHead>
                                <CTableRow>
                                    <CTableHeaderCell style="background-color: #e5e7eb" scope="col">#</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Type</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Description</CTableHeaderCell>
                                    <CTableHeaderCell scope="col">Value</CTableHeaderCell>
                                </CTableRow>
                            </CTableHead>
                            <CTableBody>
                                <CTableRow :key="operation.id" v-for="operation in operations">
                                    <CTableHeaderCell style="background-color: #e5e7eb" scope="row">{{ operation.id }}</CTableHeaderCell>
                                    <CTableDataCell>{{ getTransactionName(operation.type) }}</CTableDataCell>
                                    <CTableDataCell>{{ operation.description }}</CTableDataCell>
                                    <CTableDataCell>{{ operation.value }}</CTableDataCell>
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
