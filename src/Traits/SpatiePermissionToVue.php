<?php

namespace SpatiePermissionsToVueInertia\Traits;

trait SpatiePermissionsToVue
{
	/**
	 * Get user permissions and roles.
	 *
	 * @return json
	 */
	public function jsPermissions()
	{
		return json_encode([
			'roles' => $this->getRoleNames(),
			'permissions' => $this->getAllPermissions()->pluck('name'),
		]);
	}
}
