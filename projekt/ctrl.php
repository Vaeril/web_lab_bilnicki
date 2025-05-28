<?php
require_once 'init.php';

require_once 'routing.php';


use core\App;
use core\Utils;
use core\SessionUtils;

SessionUtils::loadMessages();


App::getRouter()->setDefaultRoute('redirect'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('register', 'LoginCtrl');
Utils::addRoute('login', 'LoginCtrl');
Utils::addRoute('logout', 'LoginCtrl', ['user', 'lead']);
Utils::addRoute('redirect', 'LoginCtrl', ['user', 'lead']);

        // for users - managing notes
Utils::addRoute('notesList', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('editNote', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('saveNote','NotesCtrl', ['user', 'lead']);
Utils::addRoute('addNote', 'NotesCtrl', ['user', 'lead']);
Utils::addRoute('deleteNote', 'NotesCtrl', ['user', 'lead']);

        // for users - managing categories
Utils::addRoute('categoriesList', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('editCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('saveCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('addCategory', 'CategoriesCtrl', ['user', 'lead']);
Utils::addRoute('deleteCategory', 'CategoriesCtrl', ['user', 'lead']);

        // for users - working in groups
Utils::addRoute('groupsList', 'GroupsCtrl', ['user', 'lead']);
Utils::addRoute('enterGroupSpace', 'GroupsCtrl', ['user', 'lead']);
Utils::addRoute('exitGroupSpace', 'GroupsCtrl', ['user', 'lead']);

        // for leads - managing groups
Utils::addRoute('addGroup', 'GroupsCtrl', 'lead');
Utils::addRoute('editGroup', 'GroupsCtrl', 'lead');
Utils::addRoute('saveGroup', 'GroupsCtrl', 'lead');
Utils::addRoute('chooseMember', 'GroupsCtrl', 'lead');
Utils::addRoute('addMember', 'GroupsCtrl', 'lead');
Utils::addRoute('deleteGroup', 'GroupsCtrl', 'lead');
Utils::addRoute('removeMember', 'GroupsCtrl', 'lead');

App::getRouter()->go();

// After all actions:
/*
        - try and catch in all places with database
        - safeguarding to editing notes, categories, groups     -> done
        - stronnicowanie rezultatów: notatki i grupy, użytkownicy       -> done
        - ograniczenie w liczbie tworzonych kategorii do 20     -> done
        - ajax
*/