<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Orders List
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="container mx-auto">
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>Active orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" width="80" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order ID
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($order->orderStatus != "Completed"): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->id); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('D, d F Y, h:i', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <?php if(Auth::user()->name === 'admin'): ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <select name="orderStatus">
                                        <option value="Pending">Pending</option>
                                        <option value="Pick up">Ready to pick up</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </td>
                            <?php else: ?>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                    <?php echo e($order->orderStatus); ?>

                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div><br><br>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 text-lg font-semibold bg-gray-50">
                <h2>Past orders</h2>
            </div>
            <div class="shadow overflow-hidden border-b border-gray-200 py-3 px-3 bg-white">
                <table class="min-w-full divide-y divide-gray-200 w-full">
                    <thead>
                        <tr>
                            <th scope="col" width="80" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order ID
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Time
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Total (RM)
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-center">
                                Order status
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($order->orderStatus == "Completed"): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->id); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e(date('D, d F Y, h:i', strtotime($order->created_at))); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->totalPrice); ?>

                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                <?php echo e($order->orderStatus); ?>

                            </td>
                        </tr>
                    </tbody>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\Users\zulhu\Documents\GitHub\Kopiamo\resources\views/order/index.blade.php ENDPATH**/ ?>