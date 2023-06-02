# Reproducer for Symfony 6.3 dependency injection autowiring issue with  `#[Target]`

```
➜  sf-reproducer-autowiring-target-attribute git:(main) ✗ symfony console -vvv

In DefinitionErrorExceptionPass.php line 51:
                                                                                                                           
  [Symfony\Component\DependencyInjection\Exception\RuntimeException]                                                       
  Cannot autowire service "App\Command\FooCommand": "#[Target('console')" on argument "$logger" of method "__construct()"  
                                                                                                                           

Exception trace:
  at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/Compiler/DefinitionErrorExceptionPass.php:51
 Symfony\Component\DependencyInjection\Compiler\DefinitionErrorExceptionPass->processValue() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/Compiler/AbstractRecursivePass.php:86
 Symfony\Component\DependencyInjection\Compiler\AbstractRecursivePass->processValue() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/Compiler/DefinitionErrorExceptionPass.php:29
 Symfony\Component\DependencyInjection\Compiler\DefinitionErrorExceptionPass->processValue() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/Compiler/AbstractRecursivePass.php:47
 Symfony\Component\DependencyInjection\Compiler\AbstractRecursivePass->process() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/Compiler/Compiler.php:80
 Symfony\Component\DependencyInjection\Compiler\Compiler->compile() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/dependency-injection/ContainerBuilder.php:767
 Symfony\Component\DependencyInjection\ContainerBuilder->compile() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/http-kernel/Kernel.php:506
 Symfony\Component\HttpKernel\Kernel->initializeContainer() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/http-kernel/Kernel.php:757
 Symfony\Component\HttpKernel\Kernel->preBoot() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/http-kernel/Kernel.php:126
 Symfony\Component\HttpKernel\Kernel->boot() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/framework-bundle/Console/Application.php:154
 Symfony\Bundle\FrameworkBundle\Console\Application->registerCommands() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/framework-bundle/Console/Application.php:72
 Symfony\Bundle\FrameworkBundle\Console\Application->doRun() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/console/Application.php:174
 Symfony\Component\Console\Application->run() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/symfony/runtime/Runner/Symfony/ConsoleApplicationRunner.php:54
 Symfony\Component\Runtime\Runner\Symfony\ConsoleApplicationRunner->run() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/vendor/autoload_runtime.php:29
 require_once() at /Users/halliaume/workspace-os/sf-reproducer-autowiring-target-attribute/bin/console:11                                                                                                              
```

# How to reproduce

1. Clone this repository
2. Run `composer install`
3. Run `bin/console app:foo`
4. You should get the error above

# Expected behavior

1. Downgrade to Symfony 6.2:
    1. Open your `composer.json`
    2. Replace all `6.3` by `6.2` 
    3. Run `composer install`
2. Run `bin/console app:foo`
3. The command should run without error
