<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role', 'permission',
    ];

    public function hasPermissionTo($permission)
    {

        $permissions = explode(',', $this->permission);

        return in_array($permission, $permissions);
    }

    public function routePermission($routeRquest)
    {

        $routes = [
            '1' => ['admin.index'],
            '2' => [
                'admin.request.public',
                'admin.request.replay',
                'admin.request.delete',
            ],
            '3' => [
                'admin.request.reservation',
                'admin.request.replay',
                'admin.request.delete',
            ],
            '4' => [
                'admin.page.index',
                'admin.slider.index',
                'admin.slider.edit',
                'admin.slider.create',
                'admin.slider.update_create',
                'admin.slider.delete',

                // location
                'admin.location.index',
                'admin.location.create',
                'admin.location.edit',
                'admin.location.update_create',
                'admin.location.delete',

                // setting
                'admin.setting.index',
                'admin.setting.update',

                // about
                'admin.about.index',
                'admin.about.update',

                // chairman
                'admin.chairman.index',
                'admin.chairman.update',

                // Blog
                'admin.post.index',
                'admin.post.edit',
                'admin.post.create',
                'admin.post.update_create',
                'admin.post.delete',

                // service
                'admin.service.index',
                'admin.service.create',
                'admin.service.edit',
                'admin.service.update_create',
                'admin.service.delete',

                // price
                'admin.price.index',
                'admin.price.create',
                'admin.price.edit',
                'admin.price.update_create',
                'admin.price.delete',

                // portfolio
                'admin.portfolio.index',
                'admin.portfolio.create',
                'admin.portfolio.edit',
                'admin.portfolio.update_create',
                'admin.portfolio.delete',

                // client
                'admin.client.index',
                'admin.client.create',
                'admin.client.edit',
                'admin.client.update_create',
                'admin.client.delete',

                // skill
                'admin.skill.index',
                'admin.skill.create',
                'admin.skill.edit',
                'admin.skill.update_create',
                'admin.skill.delete',

                // milestone
                'admin.milestone.index',
                'admin.milestone.create',
                'admin.milestone.edit',
                'admin.milestone.update_create',
                'admin.milestone.delete',

                // work
                'admin.work.index',
                'admin.work.create',
                'admin.work.edit',
                'admin.work.update_create',
                'admin.work.delete',

            ],
            '5' => [
                'admin.team.index',
                'admin.team.create',
                'admin.team.edit',
                'admin.team.update_create',
                'admin.team.delete',

            ],
            '6' => [
                'admin.project.past',
                'admin.project.current',
                'admin.project.create',
                'admin.project.edit',
                'admin.project.update_create',
                'admin.project.delete',
                'admin.project.delete_category',
                'admin.project.delete_location',
            ],
            '7' => [
                'admin.contact.index',
                'admin.contact.create',
                'admin.contact.edit',
                'admin.contact.update_create',
                'admin.contact.delete',
            ],
            '8' => [
                'admin.partner.index',
                'admin.partner.create',
                'admin.partner.edit',
                'admin.partner.update_create',
                'admin.partner.delete',
            ],
            '9' => [
                'admin.manager.index',
                'admin.manager.create',
                'admin.manager.edit',
                'admin.manager.update_create',
                'admin.manager.delete',

                'admin.roles.index',
                'admin.roles.create',
                'admin.roles.edit',
                'admin.roles.update_create',
                'admin.roles.delete',
            ],
            '10' => [
                'admin.blog.index',
                'admin.blog.create',
                'admin.blog.edit',
                'admin.blog.update_create',
                'admin.blog.delete',
            ],
            '11' => [
                'admin.mail.index',
                'admin.mail.read',
            ],
        ];

        // check if the user has th e permission to the route
        foreach ($routes as $key => $value) {
            if (in_array($routeRquest, $value)) {
                if ($this->hasPermissionTo($key)) {
                    return true;
                }
            }
        }

    }

}
