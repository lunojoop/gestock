<?php
namespace App\Security;

use App\Entity\User;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;
use Symfony\Component\Security\Core\Exception\DisabledException;
use Symfony\Component\Security\Core\Exception\AccountExpiredException;

class UserChecker implements UserCheckerInterface
{
    public function checkPreAuth(UserInterface $user)
    {
        if (!$user instanceof User) {
            return;
        }

        // user is deleted, show a generic Account Not Found message.
        if (!$user->isActive()) {
            throw new DisabledException('..');
        }
    }

    public function checkPostAuth(UserInterface $user)
    {
        /*if (!$user instanceof AppUser) {
            return;
        }*/

        // user account is expired, the user may be notified
       /* if ($user->isExpired()) {
            throw new AccountExpiredException('...');
        }*/
    }
}
