<style>
	.ul-color-issue{
		overflow-y: scroll;
	}
	
</style>
<script src="https://unpkg.com/feather-icons"></script>


<div class="nk-sidebar" id="sidebar-menu">
	<div class="nk-nav-scroll">
		<ul class="metismenu ul-color-issue" id="menu">
			<!-- DASHBOARD -->
			<li class="s_meun dashboard_active">
				<a href="{{url('/admin/dashboard')}}"> <i data-feather="airplay"></i> <span class="nav-text">Dashboard</span> </a>
			</li>
			
			<li class="s_meun blogs_active">
				<a href="{{url('/admin/blogs')}}"><i class="icon-notebook"></i> <span>Blogs</span></a>
			</li>
				
			<li class="s_meun logout_active">
				<a href="{{url('/admin/logout')}}"><i class="icon-logout"></i> <span>Logout</span></a>
			</li>
			</li>
		</ul>
	</div>
</div>
<script>
	feather.replace();
</script>