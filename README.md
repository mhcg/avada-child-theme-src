# Avada Child Theme Source Files

## Overview

These are the source files for the [Avada Child Theme](https://github.com/mhcg/avada-child-theme-src) repo used as a starting point template for any WordPress Avada Child Theme project.

See the [mhcg/Avada-Child-Theme](https://github.com/mhcg/avada-child-theme-src) repo for details of what's included, this repo only contains details of the development side of things.

## Development Files

This repo includes VS Code Container files so this project can be worked on locally or via Codespaces. The general idea being, the files can be developed and tested before being released back into the release repo for use as a template. In a nutshell, all the files in the `src/` folder should end up in the release repo.

This repo does not contain the Avada theme, it should be obtained through normal channels and installed onto this site before activating the child theme.

## Container Files

Once up and running, the `~/wordpress` folder will be the root of the site, and the `~/src` folder will be mapped to `(site root)/wp-content/themes/Avada-Child-Theme`.