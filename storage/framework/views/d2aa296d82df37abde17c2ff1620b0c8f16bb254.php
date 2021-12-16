<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@%5E2/dist/tailwind.min.css" rel="stylesheet">
</head>

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="flex justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-5">
                    Menu List
                </h2>
            </div>
            <form class="w-full max-w-sm" action="<?php echo e(url('/search')); ?>" method="GET">
                <div class="flex items-center border-b border-teal-500 py-2">
                  <input class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" name="search" type="search" placeholder="Search Menu">
                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded','type' => 'button']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded','type' => 'button']); ?>
                    Search
                   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </form>
        </div>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php if(auth()->guard()->check()): ?> 
                <?php if(Auth::user()->name === 'admin'): ?>
                    <div class="block mb-8">
                        <a href="<?php echo e(route('menu.create')); ?>" class="bg-green-500 hover:bg-green text-white font-bold py-2 px-4 rounded">Add Menu</a>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->name === 'admin'): ?>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                    <tr>

                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Description
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Type
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Price
                                        </th>
                                        
                                        
                                        <th scope="col" width="200" class="py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider ">
                                            Action
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuName); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuDesc); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuType); ?>

                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?php echo e($menu->menuPrice); ?>

                                            </td>

                                            <?php if(auth()->guard()->check()): ?>
                                                <?php if(Auth::user()->name === 'admin'): ?>
                                                    <td class="px-6 py-4 mt-2 whitespace-nowrap text-sm font-medium">
                                                        <!--<a href="<?php echo e(route('menu.show', $menu->id)); ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a> -->
                                                        <a href="<?php echo e(route('menu.edit', $menu->id)); ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                        <form class="inline-block" action="<?php echo e(route('menu.destroy', $menu->id)); ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="submit" class="text-red-600 hover:text-red-900 mr-2 mt-4" value="Delete">
                                                        </form>
                                                    </td>
                                                
                                                <?php endif; ?>
                                                
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="flex flex-col">
                                <div class="grid grid-flow-cols grid-rows-auto grid-cols-4 gap-4">
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="w-60 p-2 bg-white rounded-xl transform transition-all hover:-translate-y-2 duration-300 shadow-lg hover:shadow-2xl">
                                            <!--<img src="img/carousel1.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">-->
                                            <div class="p-2">
                                                <h2 class="font-bold test-lg mb-2"><?php echo e($menu->menuName); ?></h2>
                                                <p class="text-sm text-gray-600"><?php echo e($menu->menuDesc); ?><p>
                                                <p class="text-sm text-gray-600"><?php echo e($menu->menuType); ?><p>
                                                <p class="text-sm text-gray-600">RM <?php echo e($menu->menuPrice); ?><p>
                                            </div>
                                            <form action="<?php echo e(route('order.show', $menu->id)); ?>" method="GET">
                                                <?php echo csrf_field(); ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'jetstream::components.button','data' => ['class' => 'mt-4']]); ?>
<?php $component->withName('jet-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mt-4']); ?>
                                                    <?php echo e(__('Buy Now')); ?>

                                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </form>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div> 
                </div>
            <?php endif; ?>
            <?php endif; ?>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH E:\Kopiamo\resources\views/menu/index.blade.php ENDPATH**/ ?>