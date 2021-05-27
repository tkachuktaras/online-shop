<button type="button" class="btn btn-outline-dark mr-1">Dashboard</button>
<button type="button" onclick="window.location.href='{{ route('user.index') }}'" class="btn btn-outline-dark mr-1">Users</button>
<button type="button" onclick="window.location.href='{{ route('category.index') }}'" class="btn btn-outline-dark mr-1">Categories</button>
<button type="button" onclick="window.location.href='/admin-panel/orders'" class="btn btn-outline-dark mr-1">Orders</button>
<button type="button" onclick="window.location.href='{{ route('product.index') }}'" class="btn btn-outline-dark">Products</button>
