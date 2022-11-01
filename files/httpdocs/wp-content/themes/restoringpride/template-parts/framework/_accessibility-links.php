<?php if(get_field('accessibility_links', 'option') || get_field('site_search', 'option')): ?>
	<div class="accessibility-links-wrapper" style="display:none">
		<ul class="container accessibility-links no-margin">
			<?php if (get_field('accessibility_links', 'option')): ?>
				<li><a href="#main"><i class="fas fa-caret-down"></i> Skip to content</a></li>
				<li><a href="#" title="Toggle dark mode for night time reading" class="toggleNightMode"><i class="far fa-moon"></i> Night mode</a></li>
				<li><a href="/accessibility" title="Read our accessibility statement">Accessibility</a></li>
			<?php endif; ?>
			<?php if (get_field('site_search', 'option')): ?>
				<li><a href="#" class="toggleSearch"><i class="fas fa-search"></i> Search</a></li>
			<?php endif; ?>
		</ul>
	</div>
<?php endif; ?>