VAGRANTFILE_API_VERSION = "2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "trusty64"
  config.vm.box_url = "http://cloud-images.ubuntu.com/vagrant/trusty/current/trusty-server-cloudimg-amd64-vagrant-disk1.box"

  # synced (shared) folder with the host
  config.vm.synced_folder "src", "/var/www/vhosts/wecamp.local"

  # in order to use NFS, we need host-only networking with a static ip address
  config.vm.network "private_network", ip: "192.168.33.17"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. For this configuration
  # we will be accessing HTTP on port 4567.
  config.vm.hostname = "wecamp"
  config.hostsupdater.aliases = [
    "wecamp",
    "wecamp.dev",
    "wecamp.local",
    "phpmyadmin.wecamp.local"
  ]

  config.vm.provider "virtualbox" do |v|
    v.memory = 1024
  end

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "deployment/provision.yml"
    ansible.inventory_path = "deployment/hosts"
    ansible.limit = "local"
  end

  config.vm.post_up_message = "\n\nProvisioning is done, visit http://wecamp.local for your WeCamp application! \n\nVisit http://phpmyadmin.wecamp.local for phpMyAdmin (MySQl credentials are root:temppassword).\n\n"
end
