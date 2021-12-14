<link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">

<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create Menu
        </h2>
     <?php $__env->endSlot(); ?>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="<?php echo e(route('menu.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuName" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="menuName" id="menuName" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="<?php echo e(old('menuName', '')); ?>" />
                            <?php $__errorArgs = ['menuName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuDesc" class="block font-medium text-sm text-gray-700">Description</label>
                            <input type="text" name="menuDesc" id="menuDesc" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="<?php echo e(old('menuDesc', '')); ?>" />
                            <?php $__errorArgs = ['menuDesc'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuType" class="block font-medium text-sm text-gray-700">Type</label>
                            <input type="text" name="menuType" id="menuType"  class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="<?php echo e(old('menuType', '')); ?>" />
                            <?php $__errorArgs = ['menuType'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="menuPrice" class="block font-medium text-sm text-gray-700">Price</label>
                            <input type="text" name="menuPrice" id="menuPrice" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="<?php echo e(old('menuPrice', '')); ?>" />
                            <?php $__errorArgs = ['menuPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-sm text-red-600"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button  type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150" 
                             >   Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\Users\Fahmi ZB W\Documents\GitHub\Kopiamo\resources\views/menu/create.blade.php ENDPATH**/ ?>