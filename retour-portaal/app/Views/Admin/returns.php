    <div class="col-span-2 md:col-span-3 lg:col-span-4 mt-4 mr-4">
        <div class="flex flex-col justify-center">
            <div class="overflow-x-auto shadow-md rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    #
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    klant
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Datum
                                </th>
                                <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                    Status
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            <?php foreach ($returns as $return){
                                ?>
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $return['order_id'] ?></td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white"><?php foreach ($customers as $customer){ if ($customer['id'] == $return['customer_id']){ echo $customer['firstname'] . " " . $customer['lastname'];}} ?></td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $return['created_date'] ?></td>
                                <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo $return['status'] ?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>